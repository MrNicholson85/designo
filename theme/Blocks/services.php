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
        <?php
        foreach ($service_items as $items) {
            $image = ACF::getField('service_image', $items);
            $img_src = wp_get_attachment_image_src($image, 'large');
            $title = ACF::getField('service_title', $items);
            $link = ACF::getField('service_link', $items);

            printf(
                '
                <div class="services_item" style="background-image: url(%1$s)">
                    <h2>%2$s</h2>
                    <a class="services_link"href="%4$s" target="%5$s">%3$s <img src="' . DPS_DIR_URI . '/assets/img/right-chevron.svg"/></a>
                </div>
            ',
                esc_url($img_src[0]),
                $title,
                $link['title'],
                $link['url'],
                $link['target']
            );
        }
        ?>
    </div>
</div>