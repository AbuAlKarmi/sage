<?php


function add_post_meta_boxes() {
    // see https://developer.wordpress.org/reference/functions/add_meta_box for a full explanation of each property
    add_meta_box(
        "post_metadata_sticky_file", // div id containing rendered fields
        __("ترتيب الظهور", "sage"), // section heading displayed as text
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
    $sort = 100;
    if( isset($custom["_sort"]) && isset($custom["_sort"][0]) ){
        $sort = $custom["_sort"][0];
    }
    ?>

    <div class="components-base-control__field">
        <label class="components-base-control__label" for="file-sort">ترتيب  الملف  من حيث  الظهور</label>
        <input class="components-text-control__input" name="_sort" type="text" id="file-sort" value="<?php echo $sort ?>">
    </div>

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
        update_post_meta( $post->ID, "_sort", intval($_POST['_sort']) );
    }
}
add_action( 'save_post', 'save_post_meta_boxes' );

?>
