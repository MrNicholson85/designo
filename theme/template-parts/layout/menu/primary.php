<?php

/**
 * The Primary Site navigation
 *
 * @package wp-tailwind
 */
$menu_name = "menu-1";

if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
    $menu = wp_get_nav_menu_object($locations[$menu_name]);



    $menu_items = wp_get_nav_menu_items($menu->term_id);
    echo '<div id="primary-menu" class="navbar-container">';
    echo '<ul id="menu-dps-primary-menu" class="uk-navbar-nav" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 500">';

    foreach ($menu_items as $menu_item) {
        $title = $menu_item->title;
        $url = $menu_item->url;
        echo '<li><a href="' . $url . '">' . $title . '</a></li>';
    }
    echo '</ul>';
    echo '</div>';
} else {
    echo '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
}
