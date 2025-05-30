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
$footer_classes = "";

if (is_page('contact')) {
	$footer_classes = "no-last-call";
}
?>

<footer id="colophon" class="footer <?php echo esc_attr($footer_classes); ?>" data-aos="fade-up" data-aos-delay="500">
	<?php if (!is_page('contact')) : ?>
		<div class="dps-wrapper">
			<div class="last-call" data-aos="fade-up" data-aos-delay="600">
				<div class="md:w-[499px] w-[85%] mid:mx-0 mx-auto">
					<h2 class="lc-title" data-aos="fade-up" data-aos-delay="700"><?php echo __($last_call_title); ?></h2>
					<div class="lc-copy" data-aos="fade-up" data-aos-delay="800">
						<?php echo apply_filters('the_content', $last_call_copy); ?>
					</div>
				</div>
				<div class="lc-link" data-aos="fade-up" data-aos-delay="900">
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
	<?php endif; ?>
	<div class="footer-columns">
		<div class="dps-wrapper">
			<div class="fc-top">
				<div class="fc-image" data-aos="fade-up" data-aos-delay="500">
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
					foreach ($links as $key => $link) {
						printf(
							'<li data-aos="fade-up" data-aos-delay="' . ($key + 5) . '00' . '"><a href="%2$s" target="%3$s">%1$s</a></li>',
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
				<div class="fc-locations" data-aos="fade-up" data-aos-delay="1000">
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
				<div class="fc-contact" data-aos="fade-up" data-aos-delay="1100">
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
				<div class="fc-social" data-aos="fade-up" data-aos-delay="1200">
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