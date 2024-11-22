<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="navigation">
        <button class="navigation__toggler"><ion-icon name="grid-outline"></ion-icon></button>

        <div id="sidr-main" class="sidr">
            <div class="sidr-header">
                <button class="sidrclose"><ion-icon name="close-outline"></ion-icon></button>
            </div>

            <div class="sidr-menu">
                <?php
                    wp_nav_menu( array(
                        'depth'              => 1,
                        'container'          => false,
                        'theme_location'     => 'menu-1',
                        'menu_class'         => 'navbar',
                        'menu'               => 'Primary Menu',
                        'menu_id'            => 'primary-menu',
                    ));
                ?>
            </div>
        </div>
    </div>
