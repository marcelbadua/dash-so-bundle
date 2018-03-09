<?php

/*
Widget Name: Dash: Video Background Widget
Description: A video background widget.
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
	        'dash-video-background-widget',

	        // The name of the widget for display purposes.
	        __('Dash: Video Background Widget', 'dash-so-bundle'),

	        // The $widget_options array, which is passed through to WP_Widget.
	        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
	        array(
	            'description' => __('A video background widget.', 'dash-so-bundle'),
	            'help'        => 'https://github.com/marcelbadua/dash-so-bundle',
	        ),

	        //The $control_options array, which is passed through to WP_Widget
	        array(
	        ),

	        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
	        array(
                'url' => array(
                    'type' => 'text',
                    'label' => __('Video URL', 'dash-so-bundle'),
                ),
	        			'containment' => array(
        	         'type' => 'text',
        	         'label' => __('Containment', 'dash-so-bundle'),
        	     ),

        	    'text' => array(
    	            'type' => 'tinymce',
    	            'label' => __( 'text.', 'dash-so-bundle' ),
    	            'rows' => 4,
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
            'dash-video-background-widget',
            plugin_dir_url(__FILE__).'js/dash-video-background-widget.js',
            array( 'jquery.mb.YTPlayer' ),
            '1.0.0',
            TRUE
        );

        parent::enqueue_frontend_scripts( $instance );
    }
}

siteorigin_widget_register('dash-video-background-widget', __FILE__, 'DASH_VIDEO_BACKGROUND_WIDGET');
