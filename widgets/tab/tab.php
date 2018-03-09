<?php

/*
Widget Name: Dash: Tab Widget
Description: Adds a tab widget.
Author: Marcel Badua
Author URI: https://github.com/marcelbadua
Widget URI: https://github.com/marcelbadua/dash-so-bundle
*/

class DASH_TAB_WIDGET extends SiteOrigin_Widget {

    function __construct() {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
            // The unique id for your widget.
            'dash-tab-widget',

            // The name of the widget for display purposes.
            __('Tab Widget', 'dash-so-bundle'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Adds a tab widget.', 'dash-so-bundle'),
                'help'        => 'https://github.com/marcelbadua/dash-so-bundle',
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(
            ),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
              'title' => array(
                  'type' => 'text',
                  'label' => __('Title', 'widget-form-fields-text-domain')
              ),
                'style' => array(
                    'type' => 'select',
                    'label' => __( 'Tab style.', 'dash-so-bundle' ),
                    'default' => 'horizontal',
                    'options' => array(
                        'horizontal' => __( 'horizontal', 'dash-so-bundle' ),
                        'vertical' => __( 'vertical', 'dash-so-bundle' )
                    )
                ),
                'a_repeater' => array(
                    'type' => 'repeater',
                    'label' => __( 'Tab' , 'dash-so-bundle' ),
                    'item_name'  => __( 'Tab item', 'dash-so-bundle' ),
                    'item_label' => array(
                        'selector'     => "[id*='repeat_title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'repeat_title' => array(
                            'type' => 'text',
                            'label' => __( 'Title', 'dash-so-bundle' )
                        ),
                        'repeat_text' => array(
                            'type' => 'tinymce',
                            'label' => __( 'Content', 'dash-so-bundle' ),
                            //'default' => 'An example of a long message.</br>It is even possible to add a few html tags.</br><a href="siteorigin.com" target="_blank"">Links!</a>',
                            'rows' => 4,
                            //'default_editor' => 'html',
                            'button_filters' => array(
                                'mce_buttons' => array( $this, 'filter_mce_buttons' ),
                                'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
                                'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
                                'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
                                'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
                            ),
                        )
                    )
                )
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function initialize() {

        $this->register_frontend_scripts(
            array(
                array(
                    'dash-tab-widget',
                    plugin_dir_url(__FILE__) . 'js/dash-tab-widget.js',
                    array( ),
                    '0.0.1',
                    TRUE
                )
            )
        );

        $this->register_frontend_styles(
            array(
                array(
                    'dash-tab-widget',
                    plugin_dir_url(__FILE__) . 'styles/dash-tab-widget.css',
                    array( ),
                    '0.0.1',
                )
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

siteorigin_widget_register('dash-tab-widget', __FILE__, 'DASH_TAB_WIDGET');
