<?php
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'mytheme_register_required_plugins' );
function mytheme_register_required_plugins() {

    $plugins = array(
        array(
            'name'      => 'Advanced Custom Fields PRO',
            'slug'      => 'advanced-custom-fields-pro',
            'source'    => get_template_directory() . '/plugins/advanced-custom-fields-pro.zip',
            'required'  => true,
        ),
        array(
            'name'      => 'ACF Font Awesome',
            'slug'      => 'advanced-custom-fields-font-awesome',
            'source'    => get_template_directory() . '/plugins/advanced-custom-fields-font-awesome.zip',
            'required'  => true,
        ),
        array(
            'name'      => 'Classic Editor',
            'slug'      => 'classic-editor',
            'source'    => get_template_directory() . '/plugins/classic-editor.zip',
            'required'  => false,
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'source'    => get_template_directory() . '/plugins/contact-form-7.zip',
            'required'  => true,
        ),
        array(
            'name'      => 'One Click Demo Import',
            'slug'      => 'one-click-demo-import',
            'source'    => get_template_directory() . '/plugins/one-click-demo-import.zip',
            'required'  => true,
        ),
    );

    $config = array(
        'id'           => 'mytheme',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => false,
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );
}
