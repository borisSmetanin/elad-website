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
        // Remove all HTML tags
        $page_content_eithout_html_tags = preg_replace('/<[^>]*>[^<]*<[^>]*>/', '',$hivrot_page_item['post_content']);
        // Trime page content to be 90 charecters log
        $hivrot_page_item['page_trimmed_content'] = mb_substr($page_content_eithout_html_tags, 0, 90).'...';
        $hivrot_page_items[]                      = $hivrot_page_item;
    }

    return $hivrot_page_items;
}
add_action( 'wp_enqueue_scripts', 'get_hivrot_page_items' );

function get_hivrot_page_link_items() {

    $hivrote_page_link_items = [];
    if (is_front_page()) {

        $hivrote_page_link_items[] = [
            'title' => 'קיראו עוד',
            'link_herf'  => '#portfolio',
            'class' => 'js-scroll-trigger'
        ];
        $hivrote_page_link_items[] = [
            'title' => 'קצת עלינו',
            'link_herf'  => '#about',
            'class' => 'js-scroll-trigger'
        ];
    } else{
        $base_url           = get_option('siteurl');
        $wp_pages           = get_pages([
                'exclude' => [
                    get_option( 'page_on_front' ),
                    get_option( 'page_for_posts' ),
                    get_queried_object_id()
                ]
            ]);

        foreach($wp_pages as $wp_page)
        {
            $hivrote_page_link_items[]= [
                'title' => $wp_page->post_title,
                'link_herf'  => $base_url.'/'.$wp_page->post_name,
            ];
        }
        
    }

    $hivrote_page_link_items[] = [
        'title' => 'צורו קשר',
        'link_herf'  => '#contact',
        'class' => 'js-scroll-trigger'
    ];

    return $hivrote_page_link_items;
}

add_action( 'wp_enqueue_scripts', 'get_hivrot_page_link_items' );

// function hivrot_debug($arg) {
//     echo '<pre>';
//     var_dump($arg);
//     echo '<pre />';
//     die;    
// }

//add_action( 'after_setup_theme', 'hivrot_debug' );