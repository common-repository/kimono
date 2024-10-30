<?php
/**
 * @package Kimono Wordpress
 * @version 1.0
 */
/*
Plugin Name: Kimono Wordpress
Plugin URI: http://kimonolabs.com/wordpress/
Description: Kimono on Wordpress
Author: Kimono Labs
Version: 1.0
Author URI: http://kimonolabs.com/
*/


//
// OEmbed support
//

// Register the OEmbed provider
wp_oembed_add_provider( '#https?://(www\.)?kimonolabs\.com/kimonoblock.*#i', 'http://www.kimonolabs.com/oembed', true );
wp_oembed_add_provider( '#https?://(www\.)?kimonolabs\.com/api/([a-z0-9])*.*#i', 'http://www.kimonolabs.com/oembed', true );
// TODO CSV support?




//
// Shortcode support
//

// create the shortcode [kimono]
function kimono_func( $atts ){
    $apiid = $atts['api'];
    // TODO use shortcode_atts
    // TODO support optional colors

    if(!$apiid) {
        return "[kimono bad api!]";
    }

    extract( shortcode_atts( array(
            'apikey' => get_option('API_KEY'),
            'title' => '',
            'titlecolor' => get_option('TitleColor'),
            'titlebgcolor' => get_option('TitleBackgroundColor'),
            'propertycolor' => get_option('PropertyColor'),
            'bgcolor' => get_option('BlockBackgroundColor'),
            'textcolor' => get_option('BlockTextColor'),
            'linkcolor' => get_option('BlockLinkColor'),
            'width' => get_option('BlockWidth'),
            'height' => get_option('BlockHeight')
        ), $atts, 'kimono' ) );

    $title = urlencode($title);
    $titlecolor = str_replace('#', '', $titlecolor);
    $titlebgcolor = str_replace('#', '', $titlebgcolor);
    $propertycolor = str_replace('#', '', $propertycolor);
    $bgcolor = str_replace('#', '', $bgcolor);
    $textcolor = str_replace('#', '', $textcolor);
    $linkcolor = str_replace('#', '', $linkcolor);

    $width = $width ? $width : 220;
    $height= $height ? $height : 400;

    return "<iframe width=\"$width\" height=\"$height\" src=\"http://www.kimonolabs.com/kimonoblock/?apiid={$apiid}&apikey={$apikey}&title={$title}&titleColor={$titlecolor}&titleBgColor={$titlebgcolor}&bgColor={$bgcolor}&textColor={$textcolor}&linkColor={$linkcolor}&propertyColor={$propertycolor}\"></iframe>";
}

add_shortcode( 'kimono', 'kimono_func' );




//
// Settings support
//

add_action('admin_init', 'admin_init');
add_action('admin_menu', 'admin_menu');

function admin_init()
{
    // TODO input validation

    add_settings_section( 'section_general', 'General Settings', 'my_section_general', 'kimono' );
    register_setting('kimono', 'API_KEY');
    add_settings_field( 'section_general', 'API_KEY', 'my_setting_apikey', 'kimono', 'section_general' );

    add_settings_section( 'section_appearance', 'Appearance', 'my_section_appearance', 'kimono' );
    add_settings_field( 'TitleColor', 'Title Color', 'my_setting_TitleColor', 'kimono', 'section_appearance' );
    register_setting('kimono', 'TitleColor');
    add_settings_field( 'TitleBackgroundColor', 'Title Background Color', 'my_setting_TitleBackgroundColor', 'kimono', 'section_appearance' );
    register_setting('kimono', 'TitleBackgroundColor');
    add_settings_field( 'PropertyColor', 'Property Color', 'my_setting_PropertyColor', 'kimono', 'section_appearance' );
    register_setting('kimono', 'PropertyColor');
    add_settings_field( 'BlockBackgroundColor', 'Block Background Color', 'my_setting_BlockBackgroundColor', 'kimono', 'section_appearance' );
    register_setting('kimono', 'BlockBackgroundColor');
    add_settings_field( 'BlockTextColor', 'Block Text Color', 'my_setting_BlockTextColor', 'kimono', 'section_appearance' );
    register_setting('kimono', 'BlockTextColor');
    add_settings_field( 'BlockLinkColor', 'Block Link Color', 'my_setting_BlockLinkColor', 'kimono', 'section_appearance' );
    register_setting('kimono', 'BlockLinkColor');
    add_settings_field( 'BlockWidth', 'Block Width', 'my_setting_BlockWidth', 'kimono', 'section_appearance' );
    register_setting('kimono', 'BlockWidth');
    add_settings_field( 'BlockHeight', 'Block Height', 'my_setting_BlockHeight', 'kimono', 'section_appearance' );
    register_setting('kimono', 'BlockHeight');
}


function my_setting_apikey() {//fce7cf0d36cb20ea54c390a0849983f3G
    echo '<input type="text" id="API_KEY" name="API_KEY" size="32" value="' . get_option('API_KEY') . '">';
}

function my_setting_TitleColor() {
    echo '<input type="text" id="TitleColor" name="TitleColor" size="7" value="' . get_option('TitleColor') . '" placeholder="#ffffff">';
}
function my_setting_TitleBackgroundColor() {
    echo '<input type="text" id="TitleBackgroundColor" name="TitleBackgroundColor" size="7" value="' . get_option('TitleBackgroundColor') . '" placeholder="#659fc0">';
}
function my_setting_PropertyColor() {
    echo '<input type="text" id="PropertyColor" name="PropertyColor" size="7" value="' . get_option('PropertyColor') . '" placeholder="#dddddd">';
}
function my_setting_BlockBackgroundColor() {
    echo '<input type="text" id="BlockBackgroundColor" name="BlockBackgroundColor" size="7" value="' . get_option('BlockBackgroundColor') . '" placeholder="#ffffff">';
}
function my_setting_BlockTextColor() {
    echo '<input type="text" id="BlockTextColor" name="BlockTextColor" size="7" value="' . get_option('BlockTextColor') . '" placeholder="#333333">';
}
function my_setting_BlockLinkColor() {
    echo '<input type="text" id="BlockLinkColor" name="BlockLinkColor" size="7" value="' . get_option('BlockLinkColor') . '" placeholder="#659fc0">';
}

function my_setting_BlockWidth() {
    echo '<input type="text" id="BlockWidth" name="BlockWidth" size="4" value="' . get_option('BlockWidth') . '" placeholder="220">px';
}
function my_setting_BlockHeight() {
    echo '<input type="text" id="BlockHeight" name="BlockHeight" size="4" value="' . get_option('BlockHeight') . '" placeholder="400">px';
}


function admin_menu()
{
    add_options_page('Kimono Plugin', 'Kimono Plugin', 'manage_options', 'kimono', 'plugin_settings_page');
}

function plugin_settings_page()
{
    if(!current_user_can('manage_options'))
    {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // Render the settings template
    include(sprintf("%s/settings.php", dirname(__FILE__)));
}

function plugin_settings_link($links)
{ 
    $settings_link = '<a href="options-general.php?page=kimono">Settings</a>'; 
    array_unshift($links, $settings_link); 
    return $links; 
}

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'plugin_settings_link');

?>
