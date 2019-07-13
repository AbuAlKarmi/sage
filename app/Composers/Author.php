<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Author extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'author',
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
        return ['author' => $this->author()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function author()
    {
        $author = get_queried_object();
        return (object) [
            'display_name'  => $author->display_name,
            'bio'   => get_the_author_meta('description',$author->ID),
            'image' => get_avatar($author->ID)
        ];
    }
}
