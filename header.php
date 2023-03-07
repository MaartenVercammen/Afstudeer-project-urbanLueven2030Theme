<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Leuven</title>

    <?php wp_head();?>
</head>
<body>

<header>
    
        <div class="visible-nav-container">
        <div class="nav-burger">    
        <span class="dashicons dashicons-menu-alt3 nav-icon" onclick="openNav()"></span>
        </div>    
        <div class="end-nav">
        <div class="call-to-action-nav">
            <a href="https://afstudeer-project-urbanleuven.be/nieuwsbrief/">Sluit aan bij ons netwerk</a>
        </div>
        <div class="login-logout">
            <?php if(is_user_logged_in()){
            ?>
                <a href="http://afstudeer-project-urbanleuven.be/wp-login.php?action=logout">Logout</a>    
            <?php
            
        }
        else{ ?>
        <a href="https://afstudeer-project-urbanleuven.be/wp-login.php">Login</a>
        <?php }?>
            </div>
            </div>
        </div>
        <div class="hidden-nav-container" id="hidden-nav-container">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="nav-logo">
                <?php if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
                } ?>
            </div>    
            <div class="nav-menu">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'top-menu',
                        'menu_class' => 'top-menu',
                        'container' => 'ul',
                    )
                );
                ?>
            </div>
            <script>
        /* Set the width of the side navigation to 250px */
        function openNav() {
        document.getElementById("hidden-nav-container").style.width = "400px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
        document.getElementById("hidden-nav-container").style.width = "0";
        }
    </script>
</nav>
</header>