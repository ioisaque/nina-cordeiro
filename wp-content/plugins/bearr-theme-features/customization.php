<?php
/*
Plugin Customization
*/

/*
 * Change CLients label to GIFTS
 */
function bearr_19240_change_place_labels()
{
    global $wp_post_types;
    $p = 'clients';

    // Someone has changed this post type, always check for that!
    if ( empty ( $wp_post_types[ $p ] )
        or ! is_object( $wp_post_types[ $p ] )
        or empty ( $wp_post_types[ $p ]->labels )
        )
        return;

    // see get_post_type_labels()
    $wp_post_types[ $p ]->labels->name               = 'Gift List';
    $wp_post_types[ $p ]->labels->singular_name      = 'Gift List';
    $wp_post_types[ $p ]->labels->add_new            = 'Add gift list';
    $wp_post_types[ $p ]->labels->add_new_item       = 'Add gift list';
    $wp_post_types[ $p ]->labels->all_items          = 'All gift lists';
    $wp_post_types[ $p ]->labels->edit_item          = 'Edit gift list';
    $wp_post_types[ $p ]->labels->name_admin_bar     = 'Gift List';
    $wp_post_types[ $p ]->labels->menu_name          = 'Gift List';
    $wp_post_types[ $p ]->labels->new_item           = 'New gift list';
    $wp_post_types[ $p ]->labels->not_found          = 'No gift lists found';
    $wp_post_types[ $p ]->labels->not_found_in_trash = 'No gift lists found in trash';
    $wp_post_types[ $p ]->labels->search_items       = 'Search gift list';
    $wp_post_types[ $p ]->labels->view_item          = 'View gift list';
}

$bearr_setup_change_clients_to_gifts = get_option( 'bearr_setup_change_clients_to_gifts' );
if ( $bearr_setup_change_clients_to_gifts == 'true') {
    add_action( 'wp_loaded', 'bearr_19240_change_place_labels', 20 );
}

