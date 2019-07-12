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
    return include(config('theme.dir')."/app/fields/{$partial}.php");
}


function the_excerpt_max_charlength($limit){
    $words = explode(' ', get_the_excerpt() );
    return sprintf("%s&hellip;", implode(' ', array_slice($words, 0, $limit)) );
}
