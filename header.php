<?php
# The header of my theme.
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" type="text/css" href="https://www.emilgadzhiyev.me/wp-content/themes/emilgadzhiyev/style.css?v=sex">
    <?php wp_head(); ?>
</head>

<body>
    <div class="container layout">
        <header class="layout__header">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4 text-center text-lg-left">
                    <div class="logo text-center text-lg-left">
                        <a href="https://www.emilgadzhiyev.me/">
                            <div class="logo__name">
                                <img alt="Emil&nbsp;Gadzhiyev&#039;s" src="https://www.emilgadzhiyev.me/wp-content/themes/emilgadzhiyev/assets/svg/logo-name.svg">
                            </div>
                            <div class="logo__slogan">
                                <img alt="Web&amp;Entrepreneurship" src="https://www.emilgadzhiyev.me/wp-content/themes/emilgadzhiyev/assets/svg/logo-slogan.svg">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-8 text-center text-lg-right">
                    <nav class="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'top',
                            'container'      => '',
                            'items_wrap' => '%3$s',
                            'walker' => new Eg_Top_Menu_Walker,
                        ));
                        ?>
                    </nav>
                </div>
            </div>
        </header>