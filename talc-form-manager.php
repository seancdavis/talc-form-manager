<?php
/*
Plugin Name: Talc Form Manager
Plugin URI: http://wp-themes.rocktreedesign.com/talc-form-manager
Description: A plugin to help you create custom and powerful forms for your website. Currently, for testing purposes, users are not creating, but instead choosing fields. 
Version: 0.1
Author: rocktree Design
Author URI: http://rocktreedesign.com
*/

/* Load Files
-------------------------------------------------------------------------------- */
require_once( dirname(__FILE__) . '/rocktree-core.php' ); // REQUIRED!!! installs rocktree-core files if necessary

// not sure I want a widget
//require_once(dirname(__FILE__) . '/widgets.php'); // custom widgets

/* The Values Array
-------------------------------------------------------------------------------- */
$gs_vals = array(
	'Email' => array(
		'email_notification' => array(
			'name' => 'email_notification',
			'label' => 'Email Notification:',
			'type' => 'boolean',
			'default' => false,
			'after' => '&nbsp;&nbsp;<i>Send email notification upon form submission?</i>'
		),
		'email' => array(
			'name' => 'email',
			'label' => 'Email Address:',
			'type' => 'text',
			'default' => 'you@yourdomain.com',
			'before' => '<p><i>Address to send email notification.</i></p>'
		),
	),
	'Button' => array(
		'button_bkg' => array(
			'name' => 'button_bkg',
			'label' => 'Button Background Color',
			'type' => 'color',
			'default' => '#333333',
		),
		'button_text' => array(
			'name' => 'button_text',
			'label' => 'Button Text',
			'type' => 'text',
			'default' => 'Send Message',
		)
	)
);

$gs_args = array(
	'post_type' => 'rt_mrcf',
	'title' => 'Contact Form Settings',
	'menu_title' => 'Settings',
	'menu_slug' => 'rt_mrcf_settings',
	'script_dir' => plugins_url() . '/moon-rock-contact-form/admin/settings.js',
	'style_dir' => plugins_url() . '/moon-rock-contact-form/admin/settings.css',
	
);

$rock_args = array(
	'name' => 'My Forms',
	'prefix' => 'talc',
	'dir' => 'talc-form-manager',
	'shortcode' => 'talc',
	'shortcode_dir' => dirname(__FILE__) . '/shortcode.php',
	'post_type' => 'rt_talc',
	'item' => 'Submission',
	'description'   => 'Enables you to build forms for your users to fill out, with custom associated settings.',
	'menu_position' => 25,
	'script_dir' => plugins_url() . '/talc-form-manager/scripts.js', 
	'style_dir' => plugins_url() . '/talc-form-manager/style.css',
	'dynamic_style_dir' => dirname(__FILE__) . '/custom-style.php',
);

if( is_dir( dirname(dirname(__FILE__)) . '/rocktree-core/rocktree-core' ) ) {
	//$talc_options = new GiftShop($gs_args, $gs_vals);
	$talc = new Rock($rock_args);
	$MyUpdateChecker = new PluginUpdateChecker(
	    'http://wp-plugins.rocktreedesign.com/talc-form-manager/update.json',
	    __FILE__,
	    'talc-form-manager',
	    1
	);
}


?>