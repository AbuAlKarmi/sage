<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class PostData extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content',
        'partials.content-horizontal',
        'partials.content-featured',
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
        return [
            'featuredImage' => $this->postFeaturedImage(),
            'mainCategory'  => $this->postMainCategory(),
            'subCategories' => $this->postSubCategory(),
        ];
    }

    public function postFeaturedImage()
    {
        /**
         * @todo
         * return default image
         */
        $postImage = get_the_post_thumbnail_url( get_the_ID(), 'post-image-square' );
        if( empty($postImage) ){
            return get_theme_file_uri('/resources/assets/images/default-image.jpg');
        }else{
            return $postImage;
        }
    }

    function get_top_category ($catid) {
        $cat_parent_id=0;
        while ($catid!=null & $catid!=0) {
            $current_term = get_term($catid);
            $catid = $current_term->parent;
            if($catid!=null & $catid!=0){
                $cat_parent_id = $catid;
            }else{
                $cat_parent_id = $current_term->term_id;
            }
        }
        return $cat_parent_id;
    }

    public function postMainCategory()
    {
        $cats = get_the_category(); // category object

        $catid = $cats[0]->term_id;

        while($catid){
            $cat = get_category($catid);
            $catid = $cat->category_parent;
            $catParent = $cat->cat_ID;
        }
        $top_cat_obj = get_category($catParent);

        return [
            'title' => $top_cat_obj->name,
            'id'    => $top_cat_obj->term_id,
            'slug'  => $top_cat_obj->slug,
            'url'   => get_category_link( $top_cat_obj->term_id ),
        ];
    }
    public function postSubCategory()
    {
        $cats = get_the_category();
        $subCategories = [];
        foreach( $cats as $cat ){
            if( $cat->parent != 0 ){
                $subCategories[] = [
                    'title' => $cat->name,
                    'id'    => $cat->term_id,
                    'slug'  => $cat->slug,
                    'url'   => get_category_link( $cat->term_id ),
                ];
            }
        }

        return $subCategories;
    }
}
