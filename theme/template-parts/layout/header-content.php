<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-tailwind
 */

$header_logo = get_field('brand_logo', 'option');
?>

<header id="masthead" class="dps-wrapper">
	<div class="dps-nav-wrapper">
		<div class="brand-logo">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
				<img src="<?php echo esc_url($header_logo['url']); ?>" />
			</a>
		</div>

		<nav id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'wp-tailwind'); ?>">
			<?php
			$menu_name = "menu-1";
			if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
				$menu = wp_get_nav_menu_object($locations[$menu_name]);

				$menu_items = wp_get_nav_menu_items($menu->term_id);
				echo '<div id="primary-menu" class="navbar-container">';
				echo '<img class="md:hidden dps-menu-toggle" src="' . DPS_DIR_URI . '/assets/img/menu.svg" />';
				echo '<ul id="menu-dps-primary-menu" class="sm:hidden md:flex navbar-wrapper">';

				foreach ($menu_items as $menu_item) {
					$title = $menu_item->title;
					$url = $menu_item->url;
					echo '<li><a href="' . $url . '" class="text-white">' . $title . '</a></li>';
				}
				echo '</ul>';
				echo '</div>';
			} else {
				echo '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
			}
			?>
		</nav><!-- #site-navigation -->
	</div>
	<div class="dps-mobile-menu">
		<ul>
			<?php
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			foreach ($menu_items as $menu_item) {
				$title = $menu_item->title;
				$url = $menu_item->url;
				echo '<li><a href="' . $url . '" class="text-white">' . $title . '</a></li>';
			}
			?>
		</ul>
	</div>
</header><!-- #masthead -->