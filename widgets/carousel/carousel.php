<?php

/*
Widget Name: DASH: Carousel Widget
Description: Adds a carousel widget
Author: Marcel Badua
Author URI: http://marcelbadua.com
Widget URI:
Video URI:
 */

class DASH_CAROUSEL_WIDGET extends SiteOrigin_Widget
{

    public function __construct()
    {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
            // The unique id for your widget.
            'dash-carousel-widget',

            // The name of the widget for display purposes.
            __('DASH: Carousel Widget', 'dash-so-bundle'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Adds a carousel widget', 'dash-so-bundle'),
                'help'        => 'https://github.com/marcelbadua/dash-so-bundle',
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(
            ),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'items' => array(
                    'type'      => 'repeater',
                    'label'     => __('Carousel', 'dash-so-bundle'),
                    'item_name' => __('Carousel item', 'dash-so-bundle'),
                    'item_label' => array(
                        'selector'     => "[id*='title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields'    => array(
                        'image'         => array(
                            'type'     => 'media',
                            'label'    => __('Choose a media thing', 'dash-so-bundle'),
                            'choose'   => __('Choose image', 'dash-so-bundle'),
                            'update'   => __('Set image', 'dash-so-bundle'),
                            'library'  => 'image',
                            'fallback' => true,
                        ),
                        'title' => array(
                            'type'  => 'text',
                            'label' => __('Title', 'dash-so-bundle'),
                        ),
                        'text'  => array(
                            'type'           => 'tinymce',
                            'label'          => __('Text', 'dash-so-bundle'),
                            'rows'           => 4,
                            'default_editor' => 'html',
                            'button_filters' => array(
                                'mce_buttons'        => array($this, 'filter_mce_buttons'),
                                'mce_buttons_2'      => array($this, 'filter_mce_buttons_2'),
                                'mce_buttons_3'      => array($this, 'filter_mce_buttons_3'),
                                'mce_buttons_4'      => array($this, 'filter_mce_buttons_5'),
                                'quicktags_settings' => array($this, 'filter_quicktags_settings'),
                            ),
                        )
                    ),
                ),
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function initialize() {
        $this->register_frontend_scripts(
            array(
                array(
                    'bxslider',
                    'https://cdn.jsdelivr.net/bxslider/4.2.5/jquery.bxslider.min.js',
                    array( 'jquery' ),
                    '4.2.5',
                    TRUE
                )
            )
        );
        $this->register_frontend_scripts(
            array(
                array(
                    'dash-carousel-widget',
                    plugin_dir_url(__FILE__) . 'js/dash-carousel-widget.js',
                    array( 'jquery', 'bxslider' ),
                    '0.0.1',
                    TRUE
                )
            )
        );
        $this->register_frontend_styles(
            array(
                array(
                    'bxslider',
                    'https://cdn.jsdelivr.net/bxslider/4.2.5/jquery.bxslider.css',
                    array(),
                    '4.2.5'
                ),
            )
        );
    }
    public function get_template_name($instance)
    {
        return 'base';
    }

    public function get_style_name($instance)
    {
        return '';
    }
}

siteorigin_widget_register('dash-carousel-widget', __FILE__, 'DASH_CAROUSEL_WIDGET');
