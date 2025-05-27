<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-tailwind
 */

use wp_tailwind\theme\Fields\ACF;

$group_logo = get_field('group_logo', 'option');
$logo = ACF::getField('footer_branding_logo', $group_logo);

$group_links = get_field('group_link', 'option');
$links = $group_links['footer_nav'];

$group_location = get_field('group_location', 'option');
$group_contact = get_field('group_contact', 'option');
$group_social = get_field('group_social', 'option');

$group_last_call = get_field('last_call_group', 'option');
$last_call_title = ACF::getField('last_call_title', $group_last_call);
$last_call_copy = ACF::getField('last_call_copy', $group_last_call);
$last_call_link = ACF::getField('last_call_link', $group_last_call);
?>

<footer id="colophon" class="footer" data-aos-delay="500">
	<div class="dps-wrapper">
		<div class="last-call fadeIn">
			<div class="md:w-[499px] w-[85%] mid:mx-0 mx-auto">
				<h2 class="lc-title"><?php echo __($last_call_title); ?></h2>
				<div class="lc-copy">
					<?php echo apply_filters('the_content', $last_call_copy); ?>
				</div>
			</div>
			<div class="lc-link">
				<?php
				printf(
					'
				<a href="%2$s" target="%3$s" class="dps-light-btn">%1$s</a>
				',
					$last_call_link['title'],
					$last_call_link['url'],
					$last_call_link['target'],
				);
				?>
			</div>
		</div>
	</div>
	<div class="footer-columns">
		<div class="dps-wrapper">
			<div class="fc-top">
				<div class="fc-image">
					<?php
					echo wp_get_attachment_image(
						$logo['ID'],
						'full',
						false,
						array('class' => 'w-full')
					);
					?>
				</div>
				<hr class="fc-divider">
				<div class="fc-nav">
					<?php
					echo "<ul>";
					foreach ($links as $link) {
						printf(
							'<li><a href="%2$s" target="%3$s">%1$s</a></li>',
							$link['nav_link']['title'],
							$link['nav_link']['url'],
							$link['nav_link']['target'],
						);
					}
					echo "</ul>";
					?>
				</div>
			</div>
			<div class="fc-bottom">
				<div class="fc-locations">
					<?php
					printf(
						'
							<h3>%1$s</h3>
							<p>%2$s</p>
							',
						$group_location['location_section_title'],
						apply_filters('the_content', $group_location['location_section_copy']),
					);
					?>
				</div>
				<div class="fc-contact">
					<?php
					printf(
						'
							<h3>%1$s</h3>
							<p>%2$s</p>
							',
						$group_contact['contact_title'],
						apply_filters('the_content', $group_contact['contact_copy']),
					);
					?>
				</div>
				<div class="fc-social">
					<?php
					foreach ($group_social['social_icons'] as $icon) {
						printf(
							'<a href="%3$s" aria-label="%2$s" target="%4$s"><i class="%1$s"></i></a>',
							$icon['icons'],
							esc_html($icon['social_url']['title']),
							esc_url($icon['social_url']['url']),
							esc_attr($icon['social_url']['target']),
						);
					}
					?>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->