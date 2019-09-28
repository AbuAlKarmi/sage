<?php
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Metras Member", "sage"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="address"><?php _e("Metras Staff Member"); ?></label></th>
            <td>
                <input type="checkbox" name="metras_member" id="metras_member" value="1" <?php echo esc_attr( get_the_author_meta( 'metras_member', $user->ID ) ) == "1" ? "checked" : "" ; ?> class="regular-text" /><br />
                <span class="description"><?php _e("Metras Staff Member."); ?></span>
            </td>
        </tr>
    </table>


    <h3><?php _e("Full Description", "sage"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="full_description"><?php _e("Full Description"); ?></label></th>
            <td>
                <textarea name="full_description" id="full_description" cols="30" rows="10"><?php echo esc_attr( get_the_author_meta( 'full_description', $user->ID ) ); ?></textarea>
            </td>
        </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

    update_user_meta( $user_id, 'metras_member', $_POST['metras_member'] );
    update_user_meta( $user_id, 'full_description', $_POST['full_description'] );
}
?>
