<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class CoronaContent extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'corona',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @param  array $data
     * @param  \Illuminate\View\View $view
     * @return array
     */
    public function with($data, $view)
    {
        return ['files' => $this->files()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return array
     */
    public function files()
    {
        $files = get_field('articles', get_the_ID());

        return array_map(function ($file) {
            return [
                'title' => $file->post_title,
                'image' => get_the_post_thumbnail_url($file->ID, 'post-image-square'),
                'url'   => get_post_permalink($file->ID),
                'date' => get_the_date('j F Y', $file->ID),
            ];
        }, $files);
    }
}
