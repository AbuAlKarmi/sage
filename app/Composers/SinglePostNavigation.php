<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class SinglePostNavigation extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'single',
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
        return ['nextPosts' => $this->nextPost(),'previousPosts' => $this->previousPost()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function nextPost()
    {
        $post = get_next_post(true);
        if( $post ){
            return $this->postDetails($post);
        }
        return [];
    }
    public function previousPost()
    {
        $post = get_previous_post(true);
        if( $post ){
            return $this->postDetails($post);
        }
        return [];
    }

    function postDetails( $post ){
        $args = array(
            'posts_per_page' => 1,
            'include' => $post->ID
        );
        return [get_post($post->ID)];
    }
}
