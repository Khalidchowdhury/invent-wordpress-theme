<?php

function mytheme_import_files() {
    return [
        [
            'import_file_name'             => 'Main Demo',
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-data/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-data/customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/demo-data/preview.jpg',
            'import_notice'                => __( 'Importing demo content. Please wait...', 'mytheme' ),
        ],
    ];
}
add_filter( 'ocdi/import_files', 'mytheme_import_files' );

function mytheme_after_import_setup() {
    $home = get_page_by_title('Home');
    if ($home) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home->ID);
    }

    // Import ACF Fields
    if ( function_exists('acf_import_field_group') ) {
        $json = file_get_contents( get_template_directory() . '/demo-data/acf-fields.json' );
        $fields = json_decode( $json, true );
        if ( is_array( $fields ) ) {
            foreach ( $fields as $field_group ) {
                acf_import_field_group( $field_group );
            }
        }
    }
}
add_action( 'ocdi/after_import', 'mytheme_after_import_setup' );

function mytheme_ocdi_plugin_page_setup( $default_settings ) {
    return array_merge( $default_settings, array(
        'parent_slug' => 'themes.php',
        'page_title'  => 'Import Demo',
        'menu_title'  => 'Import Demo',
        'capability'  => 'import',
        'menu_slug'   => 'mytheme-demo-import',
    ));
}
add_filter( 'ocdi/plugin_page_setup', 'mytheme_ocdi_plugin_page_setup' );
