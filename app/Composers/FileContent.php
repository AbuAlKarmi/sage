<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class FileContent extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-files',
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
        return ['posts' => $this->posts()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return array
     */
    public function posts()
    {
        $files = get_field('articles', get_the_ID());
        usort($files, function($a, $b) {
            return strtotime($a->post_date) - strtotime($b->post_date);
        });

        return array_reverse($files);
    }
}
