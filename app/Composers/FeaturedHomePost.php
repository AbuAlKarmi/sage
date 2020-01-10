<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;
use Illuminate\Support\Facades\DB;

class FeaturedHomePost extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'index',
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
        return ['featuredHomePosts' => $this->featuredHomePost($view->getName()) ];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function featuredHomePost($view)
    {
        $args = [
            'post_type'         => 'pinned_posts',
            'posts_per_page'    => '1',
        ];
        $pinnedPosts = get_posts( $args );
        if( $pinnedPosts && isset($pinnedPosts[0]) ){
            $postId = $pinnedPosts[0]->ID; 
            return [ get_post(get_field('post', $postId)) ];
        }

        $args = [
            'author_name'       => 'metras',
            'orderby'           => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => '1',
        ];

        return get_posts($args);
    }
}
