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
        <div class="nav-list">
        <?php wp_nav_menu( array( 
            'theme_location' => 'top-menu', 
            "menu_class" => "top-bar"
            ) ); ?>
        <?php if(is_user_logged_in()){
            ?>
            <div class="center-login-logout">
            <a href="http://afstudeer-project-urbanleuven.be/wp-login.php?action=logout">Logout</a>    
        </div>
            <?php
            
        }
        else{ ?>
        <div class="center-login-logout">
        <a href="https://afstudeer-project-urbanleuven.be/wp-login.php">Login</a>
        </div>
        <?php }?>
        </div>
    </div>
</header>