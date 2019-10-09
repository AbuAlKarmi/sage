<?php

namespace App;

use Jenssegers\Agent\Agent;


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
    global $post, $posts;
    $words = explode(' ', get_the_excerpt() );
    if( isset($words) && count($words) <= 1 ){
        if ( metadata_exists( 'post', $post->ID, '_yoast_wpseo_metadesc' ) ) {
            $words = explode(' ', get_post_meta($post->ID, '_yoast_wpseo_metadesc', true));
        }
    }
    return sprintf("%s&hellip;", implode(' ', array_slice($words, 0, $limit)) );
}


function get_post_image($postId, $size = 'post-image-square'){
    $postImage = get_the_post_thumbnail_url( get_the_ID(), $size );
    if( empty($postImage) ){
        return get_theme_file_uri('/resources/assets/images/default-image.jpg');
    }else{
        return $postImage;
    }
}


function the_post_paragraphs() {
    global $post, $posts;
    $post_content = $post->post_content;
    $post_content = apply_filters('the_content', $post_content);
    $post_content = str_replace('</p>', '', $post_content);
    $paras = explode('<p>', $post_content);
    array_shift($paras);

    return join("\n\r", ["<p>$paras[0]</p>","<p>$paras[1]</p>"]);
}


// Numeric Page Navi
function page_navi($before = '', $after = '')
{
    global $wpdb, $wp_query;
    $request        = $wp_query->request;
    $posts_per_page = intval(get_query_var('posts_per_page'));
    $paged          = intval(get_query_var('paged'));
    $numposts       = $wp_query->found_posts;
    $max_page       = $wp_query->max_num_pages;
    if ($numposts <= $posts_per_page) {return;}
    if (empty($paged) || $paged == 0) {
        $paged = 1;
    }
    $pages_to_show         = 10;
    $pages_to_show_minus_1 = $pages_to_show - 1;
    $half_page_start       = floor($pages_to_show_minus_1 / 2);
    $half_page_end         = ceil($pages_to_show_minus_1 / 2);
    $start_page            = $paged - $half_page_start;
    if ($start_page <= 0) {
        $start_page = 1;
    }
    $end_page = $paged + $half_page_end;
    if (($end_page - $start_page) != $pages_to_show_minus_1) {
        $end_page = $start_page + $pages_to_show_minus_1;
    }
    if ($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page   = $max_page;
    }
    if ($start_page <= 0) {
        $start_page = 1;
    }

    echo $before . '<nav aria-label="Page navigation"><ul class="pagination">' . "";

    $prevposts = get_previous_posts_page_link();
    if ($prevposts) {echo '<li class="page-item"><a href="' . $prevposts . '" class="page-link">
        <span aria-hidden="true">&laquo;</span>
    <span class="sr-only">Previous</span></a></li>';}

    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $paged) {
            echo '<li class="active page-item"><a href="#" class="page-link">' . $i . '</a></li>';
        } else {
            echo '<li class="page-item"><a href="' . get_pagenum_link($i) . '" class="page-link">' . $i . '</a></li>';
        }
    }
    $nextposts = get_next_posts_page_link();
    // echo $nextposts;
    if ($nextposts && $paged < $max_page) {echo '<li class="page-item"><a href="' . $nextposts . '" class="page-link">
        <span aria-hidden="true">&raquo;</span>
    <span class="sr-only">Next</span></a></li>';}
    echo '</ul></nav>' . $after . "";
}

function the_post_thumbnail_caption() {
    global $post;

    $thumbnail_id    = get_post_thumbnail_id($post->ID);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

    if ($thumbnail_image && isset($thumbnail_image[0])) {
        echo '<div class="featured-image-caption">'.$thumbnail_image[0]->post_content.'</div>';
    }
}

/**
 * @param WP_Query|null $wp_query
 * @param bool $echo
 *
 * @return string
 * Accepts a WP_Query instance to build pagination (for custom wp_query()),
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 4.9.5
 * - Tested with Bootstrap 4.1
 * - Tested on Sage 9
 *
 * USAGE:
 *     <?php echo bootstrap_pagination(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ...
 *       echo bootstrap_pagination($query);
 *     ?>
 */
function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true ) {

    if ( null === $wp_query ) {
        global $wp_query;
    }

    $pages = paginate_links( [
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'       => '?paged=%#%',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __( '« السابق' ),
            'next_text'    => __( 'التالي »' ),
            'add_args'     => false,
            'add_fragment' => ''
        ]
    );

    if ( is_array( $pages ) ) {
        //$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

        $pagination = '<nav class="page navigation d-flex justify-content-end pt-2"><ul class="pagination">';

        foreach ($pages as $page) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></nav>';

        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}

function isMobile() {
    $agent = new Agent();
    return $agent->isMobile();
}

function cardPartial() {
    return isMobile() ? 'partials.content' : 'partials.content-horizontal';
}
