<?php
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("عضو متراس", "sage"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="address"><?php _e("عضو متراس"); ?></label></th>
            <td>
                <input type="checkbox" name="metras_member" id="metras_member" value="1" <?php echo esc_attr( get_the_author_meta( 'metras_member', $user->ID ) ) == "1" ? "checked" : "" ; ?> class="regular-text" /><br />
                <span class="description"><?php _e("عضو هيئة تحرير متراس"); ?></span>
            </td>
        </tr>
    </table>


    <h3><?php _e("سيرة ذاتية مختصرة", "sage"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="description_summary"><?php _e("سيرة ذاتية مختصرة"); ?></label></th>
            <td>
                <input type="text" name="description_summary" id="description_summary" value="<?php echo esc_attr( get_the_author_meta( 'description_summary', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

    update_user_meta( $user_id, 'metras_member', isset($_POST['metras_member']) ? $_POST['metras_member'] : false );
    update_user_meta( $user_id, 'description_summary', $_POST['description_summary'] );
}
?>
