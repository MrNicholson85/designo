<?php

use wp_tailwind\theme\Fields\ACF;

$className = 'location-details';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];

$location_title = ACF::getField('location_title', $data);
$location_address = ACF::getField('location_address', $data);
$location_contact = ACF::getField('location_contact', $data);
$location_map = ACF::getField('map_image', $data);
$img_src = wp_get_attachment_image_src($location_map, 'large');
$location_info = ACF::getRowsLayout('location_info', $data);
?>

<div class="<?php echo esc_attr($className); ?>" data-aos="fade-up">
    <div class="loc-content" data-aos="fade-up" data-aos-delay="500">
        <div class="loc-content-heading">
            <h2><?php echo __($location_title); ?></h2>
        </div>
        <div class="location_info_wrapper">
            <?php foreach ($location_info as $item) : ?>
                <div class="loc-content-info">
                    <div class="info-title">
                        <?php echo apply_filters('the_content', $item['title']) ?>
                    </div>
                    <div class="info-content">
                        <?php echo apply_filters('the_content', $item['copy']) ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="loc-map" data-aos="fade-up" data-aos-delay="600">
        <img src="<?php echo $img_src[0]; ?>" alt="">
    </div>
</div>