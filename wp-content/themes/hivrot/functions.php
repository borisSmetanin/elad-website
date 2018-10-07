<?php

include 'Arr.php';

function get_hivrot_page_items() 
{
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

function get_hivrot_page_link_items() 
{

    $hivrote_page_link_items = [];
    if (is_front_page()) {

        $hivrote_page_link_items[] = [
            'title' => 'קצת עלינו',
            'link_herf'  => '#about',
            'class' => 'js-scroll-trigger'
        ];
        $hivrote_page_link_items[] = [
            'title' => 'קיראו עוד',
            'link_herf'  => '#portfolio',
            'class' => 'js-scroll-trigger'
        ];
        $hivrote_page_link_items[] = [
            'title' => 'טעימות מהפעילות',
            'link_herf'  => '#activity-gallery',
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


function get_main_page_gallery()
{
    $main_page_gallery_category = get_categories([
        'slug' => 'main_page_gallery'
    ]);

    if ( ! $main_page_gallery_category || ! isset($main_page_gallery_category[0]) )
    {
        return [];
    }
    
    $main_page_gallery_posts = get_posts([
        'category' => $main_page_gallery_category[0]->cat_ID
    ]);

    if ( ! $main_page_gallery_posts || ! isset($main_page_gallery_posts[0]))
    {
        return []; 
    }
      
    $main_page_gallery_data = get_post_gallery($main_page_gallery_posts[0]->ID, FALSE);

    $main_page_gallery_ids = Arr::get($main_page_gallery_data, 'ids');

    if ( ! $main_page_gallery_ids)
    {
        return [];
    }

    $main_page_gallery_ids = explode(',', $main_page_gallery_ids);

    if ( !  $main_page_gallery_ids)
    {
        return [];
    }

    $main_page_gallery = [];

    foreach($main_page_gallery_ids as $main_page_gallery_id)
    {
        $main_page_gallery[] = get_post( $main_page_gallery_id, ARRAY_A);
    }




    //$main_page_gallery = get_post(93, ARRAY_A);

    return $main_page_gallery;
    //$main_page_gallery_ids = Arr::get($main_page_gallery, 'src', [])

    //return $main_page_gallery ? Arr::get($main_page_gallery, 'src', []) : [];
}

add_action( 'wp_enqueue_scripts', 'get_main_page_gallery' );


function prefix_send_email_to_admin() {
    /**
     * At this point, $_GET/$_POST variable are available
     *
     * We can do our normal processing here
     */ 
    
    // load composer's aoutoload
    require ABSPATH . 'vendor/autoload.php';

    $config = include ABSPATH . 'config.php';

    // Use sendgrid SDK to send the email
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("no-reply@hivrot.org", "חיברות");
    $email->setSubject('הודעה חדשה מחיברות');
    $email->addTo('boris.smetanin1703@gmail.com',   'בוריס סמטנין');
    $email->addContent("text/plain", $_POST['message']);
    $email->addContent(
        "text/html", 
        strtr(
            '<html>
                <body>
                    <style>table { border 1px solid black}; tr,td,th{  border 1px solid black; } </style>
                    <table style="border 1px solid black">
                        <thead>
                            <tr>
                                <th style="border 1px solid black">מסר</th>
                                <th style="border 1px solid black">טלפון</th>
                                <th style="border 1px solid black">אימייל</th>
                                <th style="border 1px solid black">שם</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td style="border 1px solid black">{msg}</td>
                            <td style="border 1px solid black">{phone}</td>
                            <td style="border 1px solid black">{email}</td>
                            <td style="border 1px solid black">{name}</td>
                            </tr>
                        </tbody>
                    </table>
                </body>
            </html>
            ',
            [
                '{msg}'   => $_POST['message'],
                '{phone}' => $_POST['phone'],
                '{email}' => $_POST['email'],
                '{name}'  => $_POST['name'],
            ]
        )
    );

    $sendgrid = new \SendGrid($config['sendgrid']['api_key']);

    try {
        $response = $sendgrid->send($email);

        // Echo the response as json
        $response_data = [
            'status_code'     => $response->statusCode(),
            'respons_headers' => $response->headers(),
            'respons_body'    => $response->body()
        ];
        
        echo json_encode( $response_data);
    } catch (Exception $e) {

        http_response_code(500);
        // Echo the error response as json
        echo json_encode( [
            'error_message' => $e->getMessage()
        ]);
    }
}
add_action( 'admin_post_nopriv_contact_form', 'prefix_send_email_to_admin' );
add_action( 'admin_post_contact_form', 'prefix_send_email_to_admin' );

function hivrot_debug($arg) {
    echo '<pre>';
    var_dump($arg);
    echo '<pre />';
    die;    
}

add_action( 'wp_enqueue_scripts', 'hivrot_debug' );