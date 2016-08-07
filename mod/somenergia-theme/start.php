<?php
elgg_register_event_handler( 'init', 'system', 'somenergia_theme_init' );

function somenergia_theme_init() {
    
    elgg_unregister_menu_item( 'topbar', 'elgg_logo' );
    
    //Icono plugin custom_index_widgets
    elgg_unextend_view('page/elements/footer','custom_index_widgets/footerlinks');

    /** JAVASCRIPT */
//    elgg_register_js( 'somenergia_js_chosen', elgg_get_site_url() . 'mod/somenergia-theme/views/default/js/chosen.jquery.min.js' );
//    elgg_load_js( 'somenergia_js_chosen' );
    
    /** CSS */
    elgg_register_css( 'somenergia_font_roboto', '//fonts.googleapis.com/css?family=Roboto:400,900,300,100,500' );
    elgg_load_css( 'somenergia_font_roboto' );
    elgg_register_css( 'somenergia_font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
    elgg_load_css( 'somenergia_font_awesome' );
}
