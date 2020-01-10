<?php


function add_post_meta_boxes() {
    // see https://developer.wordpress.org/reference/functions/add_meta_box for a full explanation of each property
    add_meta_box(
        "post_metadata_sticky_file", // div id containing rendered fields
        __("تثبيت الملف", "sage"), // section heading displayed as text
        "post_meta_box_sticky_file", // callback function to render fields
        "files", // name of post type on which to render fields
        "side", // location on the screen
        "high" // placement priority
    );
}
add_action( "admin_init", "add_post_meta_boxes" );
?>

<?php 
function post_meta_box_sticky_file() { 
    global $post;
    $custom = get_post_custom( $post->ID );
    $isPinned = false;
    if( isset($custom["_is_pinned"]) && isset($custom["_is_pinned"][0]) ){
        $isPinned = boolval($custom["_is_pinned"][0] == "1");
    }
    ?>

    <label class="pinned">
        <input type="checkbox" name="_is_pinned" id="pinned_file" value="1" <?php echo $isPinned ? "checked" : "" ; ?> class="regular-text" />
        <?php _e("تثبيت الملف كملف رئيسي في صفحة الملفات"); ?>
    </label>

<?php } ?>

<?php 

function save_post_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( get_post_status( $post->ID ) === 'auto-draft' ) {
        return;
    }

    if( 'files' == get_post_type($post->ID) ){

        update_post_meta( $post->ID, "_is_pinned", $_POST['_is_pinned'] );

        if( isset($_POST['_is_pinned']) && $_POST['_is_pinned'] === '1' ){
            /**
             * update other posts to remove pinned values
             */
            $pinnedPostsArgs = [
                'post_type'=>'files',
                'post__not_in' => [$post->ID],
                'posts_per_page'=>'-1',
                'post_status '=> 'publish',
                'no_found_rows' => true,
                'fields' => 'ids',
                'meta_query' => [
                    [
                        'key'     => '_is_pinned',
                        'value' => '1',
                    ],
                ], 
            ];
    
            $pinnedPosts = get_posts($pinnedPostsArgs);
    
            foreach( (array)$pinnedPosts as $postId ) {    
                update_post_meta( $postId, '_is_pinned', '0' );
            }
        }
    }
}
add_action( 'save_post', 'save_post_meta_boxes' );

?>
