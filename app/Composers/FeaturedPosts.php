<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;
use Illuminate\Support\Facades\DB;

class FeaturedPosts extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'index',
        'category',
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
        return ['featuredPosts' => $this->featuredPosts($view->getName())];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function featuredPosts($view)
    {
        $args = [
            'post__in' => get_option('sticky_posts')
        ];

        if( $view === 'category' ){
            $category = get_queried_object();
            $args['category'] = $category->term_id;
        }
        $featuredPostsLoop = get_posts($args);

        return array_map(function ($post) {
            return [
                'title'     => get_the_title($post->ID),
                'subtitle'  => get_the_subtitle($post->ID, "","", false),
                'image'     => get_the_post_thumbnail_url($post->ID, 'full'),
                'url'       => get_the_permalink($post->ID),
            ];
        }, $featuredPostsLoop);
    }
}
