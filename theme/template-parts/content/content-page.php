<?php

/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-tailwind
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div <?php wp_tailwind_content_class('entry-content'); ?>>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . __('Pages:', 'wp-tailwind'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->