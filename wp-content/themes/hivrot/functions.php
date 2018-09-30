<?php

include 'Arr.php';

function get_hivrot_page_items() {
    $hivrot_page_items = [];
    $base_url           = get_option('siteurl');
    $wp_pages           = get_pages([
            'exclude' => [
                get_option( 'page_on_front' ),
                get_option( 'page_for_posts' )
            ]
        ]);

    foreach($wp_pages as $wp_page)
    {
        $hivrot_page_item                         = Arr::extract((array) $wp_page, ['ID', 'post_content', 'post_title'] );
        $hivrot_page_item['page_url']             = $base_url . '/' .$wp_page->post_name;
        $hivrot_page_item['page_trimmed_content'] = mb_substr($hivrot_page_item['post_content'], 0, 90).'...';
        $hivrot_page_items[]                  = $hivrot_page_item;
    }

    return $hivrot_page_items;
}
add_action( 'after_setup_theme', 'get_hivrot_page_items' );

function test() {
    return 'hello world';
}
add_action( 'after_setup_theme', 'test' );

// function hivrot_debug($arg) {
//     echo '<pre>';
//     var_dump($arg);
//     echo '<pre />';
//     die;    
// }

//add_action( 'after_setup_theme', 'hivrot_debug' );