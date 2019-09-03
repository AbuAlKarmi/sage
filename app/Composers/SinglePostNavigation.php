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
        return $this->getRandomPosts($data);;
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function nextPost($data)
    {
        $post = get_next_post(true);
        if( $post ){
            return $this->postDetails($post);
        }
        return [];
    }
    public function previousPost($data)
    {
        $post = get_previous_post(true);
        if( $post ){
            return $this->postDetails($post);
        }
        return [];
    }

    function getRandomPosts($data){
        if(isset($data['mainCategory']) && $data['mainCategory']['id']){
            $args = [
                'orderby' => 'rand',
                'cat' => $data['mainCategory']['id'],
                'post__not_in' => [get_the_ID()],
                'posts_per_page' => 2
            ];
            return [ 'navigationPosts' => get_posts($args)];
        }
        return ['navigationPosts' => [ $this->nextPost($data), $this->previousPost($data)]];
    }

    function postDetails( $post ){
        $args = array(
            'posts_per_page' => 1,
            'include' => $post->ID
        );
        return get_post($post->ID);
    }
}
