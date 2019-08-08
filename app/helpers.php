<?php

namespace App;

/**
 * Simple function to pretty up our field partial includes.
 *
 * @param  mixed $partial
 * @return mixed
 */
function get_field_partial($partial)
{
    $partial = str_replace('.', '/', $partial);
    return include(get_theme_file_path()."/app/fields/{$partial}.php");
}


function the_excerpt_max_charlength($limit){
    $words = explode(' ', get_the_excerpt() );
    return sprintf("%s&hellip;", implode(' ', array_slice($words, 0, $limit)) );
}


function get_post_image($postId){
    $postImage = get_the_post_thumbnail_url( get_the_ID(), 'post-image-square' );
    if( empty($postImage) ){
        return get_theme_file_uri('/resources/assets/images/default-image.jpg');
    }else{
        return $postImage;
    }
}
