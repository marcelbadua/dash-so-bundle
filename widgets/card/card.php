<?php

/*
Widget Name: Card Widget
Description: A card widget
Author: Marcel Badua
Author URI: http://example.com
Widget URI: http://example.com/hello-world-widget-docs,
Video URI: http://example.com/hello-world-widget-video
*/

class Card_Widget extends SiteOrigin_Widget
{

    function __construct()
    {
        parent::__construct('card-widget', __('Card Widget', 'card-widget-text-domain'), array(
            'description' => __('A card widget.', 'card-widget-text-domain'),
            'help' => 'http://example.com/card-widget-docs'
        ), array(), array(

            'title' => array(
                'type' => 'text',
                'label' => __('Title.', 'widget-form-fields-text-domain')
            ),
            'image' => array(
                'type' => 'media',
                'label' => __('Choose an image.', 'widget-form-fields-text-domain'),
                'choose' => __('Choose image', 'widget-form-fields-text-domain'),
                'update' => __('Set image', 'widget-form-fields-text-domain'),
                'library' => 'image',
                'fallback' => true
            ),
            'image_size' => array(
                'type' => 'text',
                'default' => 'medium',
                'label' => __('Image Size', 'widget-form-fields-text-domain')
            ),
            'text' => array(
                'type' => 'tinymce',
                'label' => __('Content', 'widget-form-fields-text-domain'),
                'rows' => 5,
                'default_editor' => 'html',
                'button_filters' => array(
                    'mce_buttons' => array(
                        $this,
                        'filter_mce_buttons'
                    ),
                    'mce_buttons_2' => array(
                        $this,
                        'filter_mce_buttons_2'
                    ),
                    'mce_buttons_3' => array(
                        $this,
                        'filter_mce_buttons_3'
                    ),
                    'mce_buttons_4' => array(
                        $this,
                        'filter_mce_buttons_5'
                    ),
                    'quicktags_settings' => array(
                        $this,
                        'filter_quicktags_settings'
                    )
                )
            ),
            'url' => array(
                'type' => 'link',
                'label' => __('Destination URL', 'so-widgets-bundle')
            ),
						'link_button_text' => array(
                'type' => 'text',
                'default' => 'Read More',
                'label' => __('Link Button Text', 'widget-form-fields-text-domain')
            ),
            'new_window' => array(
                'type' => 'checkbox',
                'label' => __('Open link in a new window', 'widget-form-fields-text-domain'),
                'default' => false
            ),
            'block_link' => array(
                'type' => 'checkbox',
                'label' => __('Make the whole card as link', 'so-widgets-bundle'),
                'default' => false
            )
        ), plugin_dir_path(__FILE__));
    }

    function get_template_name($instance)
    {
        return 'base';
    }

    function get_style_name($instance)
    {
        return '';
    }
}

siteorigin_widget_register('card-widget', __FILE__, 'Card_Widget');
