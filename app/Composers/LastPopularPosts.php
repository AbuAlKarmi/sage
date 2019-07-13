<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class LastPopularPosts extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.sidebar',
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
        return ['lastPopularPosts' => $this->popularPosts()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function popularPosts()
    {
        $args = [
            'posts_per_page' => 3,
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        ];

        $popularPosts = get_posts($args);

        return array_map(function ($post) {
            return [
                'title'     => get_the_title($post->ID),
                'subtitle'  => get_the_subtitle($post->ID, "","", false),
                'image'     => get_the_post_thumbnail_url($post->ID, 'post-image-slider'),
                'url'       => get_the_permalink($post->ID),
            ];
        }, $popularPosts);
    }
}
