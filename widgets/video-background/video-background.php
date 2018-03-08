<?php

/*
Widget Name: Video Background Widget
Description: A Video Background widget.
Author: Marcel Badua
Author URI: http://marcelbadua.com
Widget URI: 
Video URI: 
*/

class DASH_VIDEO_BACKGROUND_WIDGET extends SiteOrigin_Widget {

	function __construct() {
	    //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

	    //Call the parent constructor with the required arguments.
	    parent::__construct(
	        // The unique id for your widget.
	        'dash_video_background-widget',

	        // The name of the widget for display purposes.
	        __('Video Background', 'sdash_video_background-widget-text-domain'),

	        // The $widget_options array, which is passed through to WP_Widget.
	        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
	        array(
	            'description' => __('A Video Background widget.', 'dash_video_background-widget-text-domain'),
	            //'help'        => 'http://example.com/so_video_background-widget-docs',
	        ),

	        //The $control_options array, which is passed through to WP_Widget
	        array(
	        ),

	        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
	        array(
                'url' => array(
                    'type' => 'text',
                    'label' => __('Video URL', 'widget-form-fields-text-domain'),
                    'default' => 'Some default text.'
                ),
	        	// 'title' => array(
        	 //        'type' => 'text',
        	 //        'label' => __('Titi=le', 'widget-form-fields-text-domain'),
        	 //        'default' => 'Some default text.'
        	 //    ),
          //       'link' => array(
          //           'type' => 'text',
          //           'label' => __('Link', 'widget-form-fields-text-domain'),
          //           'default' => 'Some default text.'
          //       ),
        	    'text' => array(
    	            'type' => 'tinymce',
    	            'label' => __( 'text.', 'widget-form-fields-text-domain' ),
    	            //'default' => 'An example of a long message.</br>It is even possible to add a few html tags.</br><a href="siteorigin.com" target="_blank"">Links!</a>',
    	            'rows' => 5,
    	            'default_editor' => 'html',
    	            'button_filters' => array(
    	                'mce_buttons' => array( $this, 'filter_mce_buttons' ),
    	                'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
    	                'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
    	                'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
    	                'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
    	            ),
    	        ),

	        ),

	        //The $base_folder path string.
	        plugin_dir_path(__FILE__)
	    );
	}

    function get_template_name($instance) {
        return 'base';
    }

    function get_style_name($instance) {
        return '';
    }

    function enqueue_frontend_scripts( $instance ) {
        wp_enqueue_style( 
            'jquery.mb.YTPlayer',
            'jquery.mb.YTPlayer/3.1.11/css/jquery.mb.YTPlayer.min.css', 
            array( '' ), 
            false, 
            'all' 
        );
        wp_enqueue_script(
            'jquery.mb.YTPlayer',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.1.11/jquery.mb.YTPlayer.min.js',
            array( 'jquery' ),
            '3.1.11',
            TRUE
        );

        wp_enqueue_script(
            'dash-video-background',
            plugin_dir_url(__FILE__).'js/script.js',
            array( 'jquery.mb.YTPlayer' ),
            '1.0.0',
            TRUE
        );

        parent::enqueue_frontend_scripts( $instance );
    }
}

siteorigin_widget_register('dash_video_background-widget', __FILE__, 'DASH_VIDEO_BACKGROUND_WIDGET');