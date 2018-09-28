<?php

function get_hivrot_menue_pages() {
   
    return get_pages([
        'exclude' => [
            get_option( 'page_on_front' ),
            get_option( 'page_for_posts' )
        ]
    ]); 
}
add_action( 'after_setup_theme', 'get_hivrot_menue_pages' );


// function hivrot_debug($arg) {
//     echo '<pre>';
//     var_dump($arg);
//     echo '<pre />';
//     die;    
// }

//add_action( 'after_setup_theme', 'hivrot_debug' );