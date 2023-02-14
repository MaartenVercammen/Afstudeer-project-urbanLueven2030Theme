<?php

function Load_css()
{

    // Order matters the last one will be the one that will be used

    // Bootstrap stylesheet
   wp_register_style( "bootstrap", get_template_directory_uri() . '/css/boostrap.min.css', array(), false, 'all' );
   wp_enqueue_style('bootstrap');

   // Own stylesheet
   wp_register_style( "main", get_template_directory_uri() . '/css/main.css', array(), false, 'all' );
   wp_enqueue_style('main');
}
add_action( 'wp_enqueue_scripts', 'Load_css');

function load_js()
{
    wp_enqueue_script( 'jquery');
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/boostrap.min.js', 'jquery', false, true );
    wp_enqueue_script('bootstrap');
}


add_action(  'wp_enqueue_scripts', 'load_js');

// Theme Options

add_theme_support( "menus" );

//Menus

    //Walker
    class Menu_Walker extends Walker_Nav_Menu {
        
        function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
            $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
     
            $output .= '<img src="' . wp_get_attachment_image_src($item->thumbnail_id, $default)[0] . '"/>'; 

            if ($item->url && $item->url != '#') {
                $output .= '<a href="' . $item->url . '">';
            } else {
                $output .= '<span>';
            }
     
            $output .= $item->title;
     
            if ($item->url && $item->url != '#') {
                $output .= '</a>';
            } else {
                $output .= '</span>';
            }

            if ($depth == 0 && !empty($item->description)) {
                $output .= '<span class="description">' . $item->description . '</span>';
            }
        }

    }

register_nav_menus(
    array(
        "top-menu" => "Top Menu Location",
        "theme-menu" => "Thema Menu Location",
    )
);


// Logo
add_theme_support( 'custom-logo' );



