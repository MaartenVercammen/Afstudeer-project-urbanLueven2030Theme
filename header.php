<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Leuven</title>

    <?php wp_head(); ?>
</head>
<body>

<header>
    <?php if(is_front_page() ){
        get_template_part( 'includes/header', 'frontpageheader' );
    }; ?>
    <div class="navbar">
        <div class="nav-logo">
            <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
            } ?>
        </div>
        <?php wp_nav_menu( array( 
            'theme_location' => 'top-menu', 
            "menu_class" => "top-bar"
            ) ); ?>
    </div>
</header>