<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class CategoryColors extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.head',
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
        return ['categories' => $this->getCategoriesDetails()];
    }

    /**
     * Returns the post title.
     *
     * @param  \Illuminate\View\View $view
     * @return string
     */
    public function getCategoriesDetails()
    {
        $categories = get_categories( array(
            'orderby'       => 'name',
            'hide_empty'    => false,
        ) );

        return array_map(function($category){
            return [
                'name'      => "category-$category->term_id",
                'selector'  => ".category-$category->term_id",
                'id'        => $category->term_id,
                'color'     => get_field('category_color',"category_$category->term_id"),
            ];
        }, $categories);
    }
}
