<?php

global $wpdb, $wp_db_version, $wp_current_db_version;

$guessurl = wp_guess_url();

 // set the options to change
 $options = array(
     // we don't want no description
     'blogdescription'               => '',
     // change category base
     'category_base'                 => '/categorie',
     // change tag base
     'tag_base'                      => '/tag',
     // disable comments
     'default_comment_status'        => 'closed',
     // disable trackbacks
     'use_trackback'                 => '',
     // disable pingbacks
     'default_ping_status'           => 'closed',
     // disable pinging
     'default_pingback_flag'         => '',
     // change the permalink structure
     'permalink_structure'           => '/%postname%/',
     // dont use year/month folders for uploads
     'uploads_use_yearmonth_folders' => '',
     // don't use those ugly smilies
     'use_smilies'                   => ''
 );

 // Set autoload to no for these options
  $fat_options = array( 'moderation_keys', 'recently_edited', 'blacklist_keys', 'uninstall_plugins' );

  $keys = "'" . implode( "', '", array_keys( $options ) ) . "'";
  $existing_options = $wpdb->get_col( "SELECT option_name FROM $wpdb->options WHERE option_name in ( $keys )" );

  $insert = '';
  $update = '';
  foreach ( $options as $option => $value ) {
      if ( in_array($option, $existing_options) ):
          update_option($option, $value);
          continue;
      endif;
      if ( in_array($option, $fat_options) )
          $autoload = 'no';
      else
          $autoload = 'yes';

      if ( is_array($value) )
          $value = serialize($value);
      if ( !empty($insert) )
          $insert .= ', ';
      $insert .= $wpdb->prepare( "(%s, %s, %s)", $option, $value, $autoload );
  }
  if ( !empty($insert) )
      $wpdb->query("INSERT INTO $wpdb->options (option_name, option_value, autoload) VALUES " . $insert);

  // In case it is set, but blank, update "home".
    update_option('home', $guessurl);

  // Clear expired transients
    delete_expired_transients( true );

 // flush rewrite rules because we changed the permalink structure
 global $wp_rewrite;
 $wp_rewrite->flush_rules();


 wp_delete_comment( 1 );
 wp_delete_post( 1, TRUE );
 wp_delete_post( 2, TRUE );


 /**
  * Activate required plugins
  */
 include_once ( ABSPATH . 'wp-admin/includes/plugin.php' );


 foreach (array(
     'admin-menu-editor-pro'=>'menu-editor',
     'codepress-admin-columns'=>'codepress-admin-columns',
     'contact-form-7'=>'wp-contact-form-7',
     'duplicate-page'=>'duplicatepage',
     'file-renaming-on-upload'=>'file-renaming-on-upload',
     'white-label-cms'=>'wlcms-plugin',
     'redirection'=>'redirection',
     // 'google-sitemap-generator'=>'sitemap',
     'revslider'=>'revslider',
     'wp-file-manager'=>'index',
     'js_composer'=>'js_composer',
     'wp-super-cache'=>'wp-super-cache',
     'Ultimate_VC_Addons'=>'Ultimate_VC_Addons'
 ) as $plugin=>$file) {
     $path = sprintf('%s/%s.php', $plugin, $file);
     if (!is_plugin_active( $path )) {
         activate_plugin( $path );
     }
 }

//Maintenant que les thèmes sont activés on va mettre à jour le menu d'Administration pour le rendre un peu plus .... Sexy
$ws_menu_editor_pro = $wpdb->get_col( "SELECT option_value FROM $wpdb->options WHERE option_name = 'ws_menu_editor_pro'" );
// var_dump($ws_menu_editor_pro);
// $ws_menu_editor_pro_uns = $ws_menu_editor_pro;
// echo "<pre>";
// print_r($ws_menu_editor_pro_uns['custom_menu']['tree']);
// echo "</pre>";
$preAdminMenu= file_get_contents(get_template_directory().'/admin_menu.txt');
$unserialized = unserialize($preAdminMenu);
update_option('ws_menu_editor_pro', $unserialized);
// $wpdb->query("UPDATE $wpdb->options SET option_value='".$preAdminMenu."' WHERE option_name = 'ws_menu_editor_pro'" );
// exit;
switch_theme( 'dazzling-child' );
