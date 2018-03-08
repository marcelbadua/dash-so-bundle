<?php

/*
Widget Name: Video Widget
Description: Video Widget
Author: Marcel Badua
Author URI: http://marcelbadua.com
Widget URI:
Video URI:
*/

function youtube_id_from_url($url) {
    $pattern =
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if ($result) {
        return $matches[1];
    }
    return false;
}

class DASH_VIDEO_WIDGET extends SiteOrigin_Widget
{

    function __construct() {

        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(

        // The unique id for your widget.
        'dash-video-widget',

        // The name of the widget for display purposes.
        __('Video Widget', 'widget-text-domain') ,

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
            'description' => __('Video Widget', 'widget-text-domain') ,

            //'help'        => 'http://example.com/dash-youtube-modal-docs',

        ) ,

        //The $control_options array, which is passed through to WP_Widget
        array() ,

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
        array(

            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'widget-text-domain') ,
                'default' => 'Title'
            ) ,
            'url' => array(
                'type' => 'text',
                'label' => __('URL', 'widget-text-domain')
            ) ,
            'as_modal' => array(
                'type' => 'checkbox',
                'label' => __( 'Open Video as Modal', 'widget-form-fields-text-domain' ),
                'default' => true
            )


        ) ,

        //The $base_folder path string.
        plugin_dir_path(__FILE__));
    }

    function initialize() {
        $this->register_frontend_scripts(
            array(
                array(
                    'fancybox',
                    'https://cdn.jsdelivr.net/fancybox/2.1.5/jquery.fancybox.pack.js',
                    array( 'jquery' ),
                    '2.1.5',
                    //TRUE
                )
            )
        );
        $this->register_frontend_scripts(
            array(
                array(
                    'fancybox-media',
                    'https://cdn.jsdelivr.net/fancybox/2.1.5/helpers/jquery.fancybox-media.min.js',
                    array( 'jquery', 'fancybox' ),
                    '1.0.6',
                    //TRUE
                )
            )
        );
        $this->register_frontend_scripts(
            array(
                array(
                    'dash-video-widget',
                    plugin_dir_url(__FILE__) . 'js/script.js',
                    array( 'jquery', 'fancybox' ),
                    '0.0.1',
                    TRUE
                )
            )
        );
        $this->register_frontend_styles(
            array(
                array(
                    'dash-video-widget',
                    plugin_dir_url(__FILE__) . 'styles/styles.css',
                    array(),
                    '0.0.1'
                ),
            )
        );
        $this->register_frontend_styles(
            array(
                array(
                    'fancybox',
                    'https://cdn.jsdelivr.net/fancybox/2.1.5/jquery.fancybox.css',
                    array(),
                    '2.1.5'
                ),
            )
        );
    }

    function get_template_name($instance) {
        return 'base';
    }

    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('dash-video-widget', __FILE__, 'DASH_VIDEO_WIDGET');
