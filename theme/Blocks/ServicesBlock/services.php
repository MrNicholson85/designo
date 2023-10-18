<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'services';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$service_items = ACF::getRowsLayout('service_items', $data);
?>

<div class="<?php echo esc_attr($className); ?>">
    <div class="services_grid">
        <?php foreach ($service_items as $key => $item) : ?>
            <?php
            $image = ACF::getField('service_image', $item);
            $img_src = wp_get_attachment_image_src($image, 'large');
            $title = ACF::getField('service_title', $item);
            $link = ACF::getField('service_link', $item);
            ?>

            <div class="services_item" data-aos="fade-up" style="background-image: url('<?php echo esc_url($img_src[0]); ?>')">
                <h2 data-aos="fade-up" data-aos-delay="500"><?php echo esc_html($title); ?></h2>
                <a class="services_link" data-aos="fade-up" data-aos-delay="700" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>">
                    <?php echo esc_html($link['title']); ?>
                    <img src="<?php echo DPS_DIR_URI . '/assets/img/right-chevron.svg'; ?>" />
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>