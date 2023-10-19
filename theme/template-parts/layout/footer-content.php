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

$group_links = get_field('group_links', 'option');
$links = $group_links['footer_nav'];

$group_location = get_field('group_location', 'option');
$group_contact = get_field('group_contact', 'option');
$group_social = get_field('group_social', 'option');

$group_last_call = get_field('last_call_group', 'option');
$last_call_title = ACF::getField('last_call_title', $group_last_call);
$last_call_copy = ACF::getField('last_call_copy', $group_last_call);
$last_cal_link = ACF::getField('last_cal_link', $group_last_call);

?>

<footer id="colophon" class="footer" data-aos="fade" data-aos-delay="500">
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
				$last_cal_link['title'],
				$last_cal_link['url'],
				$last_cal_link['target'],
			);
			?>
		</div>
	</div>
	<div class="footer-columns" data-aos="fade-up" data-aos-delay="600">
		<div class="dps-wrapper">
			<div class="fc-top">
				<div class="fc-image" data-aos="fade-up" data-aos-delay="1100">
					<?php
					printf(
						'<img class="w-full" src="%1$s" />',
						$logo['url']
					);
					?>
				</div>
				<div class="fc-nav">
					<?php
					echo "<ul>";
					foreach ($links as $link) {
						printf(
							'<li data-aos="fade-up" data-aos-delay="1200"><a href="%2$s" target="%3$s">%1$s</a></li>',
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
				<div class="fc-locations" data-aos="fade-up" data-aos-delay="1300">
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
				<div class="fc-contact" data-aos="fade-up" data-aos-delay="1400">
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
				<div class="fc-social" data-aos="fade-up" data-aos-delay="1500">
					<?php
					foreach ($group_social['social_icons'] as $icon) {
						printf(
							'<i class="%1$s"></i>',
							$icon['icons']
						);
					}
					?>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->