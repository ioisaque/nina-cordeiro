<?php
// One click demo install configs
function ocdi_import_files() {
    return array(
        array(
            'import_file_name'           => 'Demo Import 1',
            'import_file_url'            => 'http://themes.themebear.co/law-and-justice/ocdi-demos/demo1/law-and-justice-export-content.xml',
            //'import_widget_file_url'     => 'http://themes.themebear.co/law-and-justice/ocdi-demos/demo1/law-and-justice_demo1_widgets.wie',
            'import_customizer_file_url' => 'http://themes.themebear.co/law-and-justice/ocdi-demos/demo1/law-and-justice-export.dat',
            'import_preview_image_url'   => 'http://themes.themebear.co/law-and-justice/ocdi-demos/demo1/screenshot.png',
            'import_notice'              => __( 'After you import this demo, go to appearance/customize and customize with your theme.', 'law-and-justice' ),
        )       
    );
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );