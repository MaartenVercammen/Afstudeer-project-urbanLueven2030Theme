<?php

function Load_css()
{

    // Order matters the last one will be the one that will be used

    // Bootstrap stylesheet
   wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
   wp_enqueue_style('bootstrap');

   // Own stylesheet
   wp_register_style( "main", get_template_directory_uri() . '/css/main.css', array(), false, 'all' );
   wp_enqueue_style('main');

   // Second css
   wp_register_style( "second", get_template_directory_uri() . '/css/second.css', array(), false, 'all' );
   wp_enqueue_style('second');
}
add_action( 'wp_enqueue_scripts', 'Load_css');

function load_js()
{
    wp_enqueue_script( 'jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true );
    wp_enqueue_script('bootstrap');
}


add_action(  'wp_enqueue_scripts', 'load_js');

// Theme Options

add_theme_support( "menus" );

//Menus

    //Walker
    class Menu_Walker extends Walker_Nav_Menu {
        
        function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
            //$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
            $output .= "<li class='thema-item'>";

            $output .= '<img class="thema-image" src="' . wp_get_attachment_image_src($item->thumbnail_id, $default)[0] . '"/>'; 

            if ($item->url && $item->url != '#') {
                $output .= '<a class="thema-title" href="' . $item->url . '">';
                
            } else {
                $output .= '<span  >';
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



// Footer

function register_widget_areas() {

    register_sidebar( array(
      'name'          => 'Footer',
      'id'            => 'footer',
      'description'   => 'Footer part of the site',
      'before_widget' => '<section class="footer-area footer-area-one">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>',
    ));
    
  }
  
  add_action( 'widgets_init', 'register_widget_areas' );

// Feature image on post
add_theme_support( 'post-thumbnails' );