<?php
/** Page Template for Dashboard */
function arch_plugin_dashboard() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    echo '<div class="wrap">';
    echo '<p>This where the Dashboard for resources will appear</p>';
    echo '</div>';
}

?>