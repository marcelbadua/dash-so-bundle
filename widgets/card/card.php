<?php

/*
Widget Name: Dash: Card Widget
Description: Adds a card widget.
Author: Marcel Badua
Author URI: https://github.com/marcelbadua
Widget URI: https://github.com/marcelbadua/dash-so-bundle
*/

class DASH_CARD_WIDGET extends SiteOrigin_Widget
{

    function __construct()
    {
        parent::__construct(

          'dash-card-widget',
          __('Dash: Card Widget', 'dash-so-bundle'),

        array(
            'description' => __('Adds a card widget.', 'dash-so-bundle'),
            'help'        => 'https://github.com/marcelbadua/dash-so-bundle',
        ),
        array(

        ),
        array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title.', 'dash-so-bundle')
            ),
            'image' => array(
                'type' => 'media',
                'label' => __('Choose an image.', 'dash-so-bundle'),
                'choose' => __('Choose image', 'dash-so-bundle'),
                'update' => __('Set image', 'dash-so-bundle'),
                'library' => 'image',
                'fallback' => true
            ),
            'image_size' => array(
                'type' => 'text',
                'default' => 'medium',
                'label' => __('Image Size', 'dash-so-bundle')
            ),
            'text' => array(
                'type' => 'tinymce',
                'label' => __('Content', 'dash-so-bundle'),
                'rows' => 4,
                'default_editor' => 'html',
                'button_filters' => array(
                    'mce_buttons' => array($this,'filter_mce_buttons'),
                    'mce_buttons_2' => array($this,'filter_mce_buttons_2'),
                    'mce_buttons_3' => array($this,'filter_mce_buttons_3'),
                    'mce_buttons_4' => array($this,'filter_mce_buttons_5'),
                    'quicktags_settings' => array($this,'filter_quicktags_settings')
                )
            ),
            'url' => array(
                'type' => 'link',
                'label' => __('Destination URL', 'dash-so-bundle')
            ),
						'link_button_text' => array(
                'type' => 'text',
                'default' => 'Read More',
                'label' => __('Link Button Text', 'dash-so-bundle')
            ),
            'new_window' => array(
                'type' => 'checkbox',
                'label' => __('Open link in a new window', 'dash-so-bundle'),
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

siteorigin_widget_register('dash-card-widget', __FILE__, 'DASH_CARD_WIDGET');
