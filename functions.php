<?php

function Load_css()
{

    // Order matters the last one will be the one that will be used

    // Bootstrap stylesheet
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    // Own stylesheet
    wp_register_style("main", get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');

    // Second css
    wp_register_style("second", get_template_directory_uri() . '/css/second.css', array(), false, 'all');
    wp_enqueue_style('second');
}
add_action('wp_enqueue_scripts', 'Load_css');

function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'load_js');

// Theme Options

add_theme_support("menus");

//Menus

//Walker
class Menu_Walker extends Walker_Nav_Menu
{

    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        //$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        $output .= "<li class='thema-item'>";

        if(wp_get_attachment_image_src($item->thumbnail_id, 'menu')){
            $output .= '<img class="thema-image" src="' . wp_get_attachment_image_src($item->thumbnail_id, 'menu')[0] . '"/>';
        }
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
add_theme_support('custom-logo');

function admin_bar(){

    if(is_user_logged_in()){
      add_filter( 'show_admin_bar', '__return_true' , 1000 );
    }
  }
  add_action('init', 'admin_bar' );

// Footer

function register_widget_areas()
{

    register_sidebar(array(
        'name' => 'Footer',
        'id' => 'footer',
        'description' => 'Footer part of the site',
        'before_widget' => '<section class="footer-area footer-area-one">',
        'after_widget' => '</section>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

}

add_action('widgets_init', 'register_widget_areas');

// Feature image on post
add_theme_support('post-thumbnails');

// Images sizes
add_image_size("menu", 400, 400, true);

//add except to pages
	
add_post_type_support( 'page', 'excerpt' );

// change excerpt lenght

if ( ! function_exists( 'cor_remove_personal_options' ) ) {
	function cor_remove_personal_options( $subject ) {
        $subject = preg_replace('#<h2>'.__("Name").'</h2>#s', '<h2>Gebruikers informatie</h2>', $subject, 1); // Remove the "Name" title
		$subject = preg_replace('#<h2>'.__("Personal Options").'</h2>#s', '', $subject, 1); // Remove the "Personal Options" title
		$subject = preg_replace('#<tr class="user-rich-editing-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "Visual Editor" field
		$subject = preg_replace('#<tr class="user-comment-shortcuts-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "Keyboard Shortcuts" field
		$subject = preg_replace('#<tr class="show-admin-bar(.*?)</tr>#s', '', $subject, 1); // Remove the "Toolbar" field
        $subject = preg_replace('#<tr class="user-syntax-highlighting-wrap(.*?)</tr>#s', '', $subject, 1); // Remove the "syntax highlight" field
        $subject = preg_replace('#<tr class="user-switching-wrap(.*?)</tr>#s', '', $subject, -1); // Remove the "user witch" field
        //$subject = preg_replace('#<tr class="user-admin-color-wrap(.*?)</tr>#s', '', $subject, -1); // Remove the "admin color" field
        $subject = preg_replace('#<h2>Contact Info</h2>#s', '', $subject, -1);
        $subject = preg_replace('#<h2>About the user</h2>#s', '', $subject, -1);
        $subject = preg_replace('#<h2>Account Management</h2>#s', '', $subject, -1);
        $subject = preg_replace('#<h2>Additional Capabilities</h2>#s', '', $subject, -1);
        $subject = preg_replace('#<h2>WordPress Multisite User Sync/Unsync</h2>#s', '', $subject, -1);
        $subject = preg_replace('#<h2>Application Passwords</h2>#s', '', $subject, -1);
        $subject = preg_replace('#<p>Application passwords allow authentication via non-interactive systems, such as XML-RPC or the REST API, without providing your actual password. Application passwords can be easily revoked. They cannot be used for traditional logins to your website.</p>#s', '', $subject, -1);
        $subject = preg_replace('#<label for="new_application_password_name">New Application Password Name</label>#s', '', $subject, -1);
        $subject = preg_replace('#<input type="text" size="30" id="new_application_password_name.*?>#s', '', $subject, -1);
        $subject = preg_replace('#<button type="button" name="do_new_application_password(.*?)</button>#s', '', $subject, -1);
        $subject = preg_replace('#<p class="description" id="new_application_password_name_desc(.*?)</p>#s', '', $subject, -1);
        $subject = preg_replace('#<button type=" button" name="do_new_application_password(.*?)</button>#s', '', $subject, -1);
        $subject = preg_replace('#<h3>Additional Capabilities</h3>(.*?)<script>#s', '<script>', $subject, -1);


                return $subject;
                }

                function cor_profile_subject_start() {
                if( ! current_user_can('administrator') ) {
                ob_start( 'cor_remove_personal_options' );
                }
                }

                function cor_profile_subject_end() {
                if ( ! current_user_can('administrator') ) {
                ob_end_flush();
                }
                }
                }
                add_action( 'admin_head', 'cor_profile_subject_start' );
                add_action( 'admin_footer', 'cor_profile_subject_end' );


// dashboard tonen

                add_shortcode('dashboard','show_dashboard');

function show_dashboard($atts){
    


    $thema=$atts['thema']; 
    $status_list=$atts['status'];
    $status_list=explode(',', $status_list);
   
   ob_start();?>

   
    <?php 
 global $wpdb;

    if ($thema == "thema-overzicht"){
        $count = $wpdb->get_results(
            "
            select count(*) as amount from wp_projecten"
        );
    } else {
        $count = $wpdb->get_results(
            "
            select count(*) as amount from wp_projecten
            where Thema = "."'".$thema."'"
        );
    };
 
 ?>
<h3>Momenteel werkt Urban Lab aan <?php echo $count[0]->amount ?> projecten <?php if ($thema != "thema-overzicht"){echo "rondom dit thema";}; ?> : </h3>
<div class=" dashboard">

    <?php


 //$status_list = ["in uitvoering", "in opstart", "afgerond", "on hold"];

foreach ($status_list as $status) {
    if ($thema == "thema-overzicht"){
        $result = $wpdb->get_results(
            "
            select count(*) as amount from wp_projecten
        where Stand_van_zaken = ".'"'.$status.'"'
        );
    } else {
        $result = $wpdb->get_results(
            "
            select count(*) as amount from wp_projecten
        where Stand_van_zaken = ".'"'.$status.'"'." and Thema = "."'".$thema."'"
        );
    };



?>
<p>
    <?php echo $status.": "; echo $result[0]->amount ?>
</p>

<?php } ; ?>

</div>
<?php if (is_user_logged_in()){ ?>
<a class="dashboard-link" href="https://afstudeer-project-urbanleuven.be/wp-admin/admin.php?page=projecten">Bekijk
    hier uitgebreid
    onze
    projecten!</a>

    <?php } ?>

<?php return ob_get_clean(); };


// add shortcode to show user email link

add_shortcode('user_email', 'show_user_email');

function show_user_email($atts, $post){
    global $post;
    $user = get_user_by('id', $post->post_author);
    $user_email = $user->user_email;
    ob_start();?>
    <div class="thema_user">
    <p><a href="mailto:<?php echo $user_email; ?>"><?php echo $user_email; ?></a></p>
    </div>
    <?php return ob_get_clean();
}


?>