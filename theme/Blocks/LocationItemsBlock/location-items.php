<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'location-items';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$location_repeater = ACF::getRowsLayout('location_repeater', $data);
?>

<div class="<?php echo esc_attr($className); ?>">
    <?php
    echo '<ul class="locations">';
    foreach ($location_repeater as $item) {
        $title = ACF::getField('item_title', $item);
        $image = ACF::getField('item_image', $item);
        $link = ACF::getField('item_cta', $item);
        $img_src = wp_get_attachment_image_src($image, 'large');
    ?>
        <li class="location-item">
            <img class="location-item__image" src="<?php echo esc_url($img_src[0]); ?>" />
            <div>
                <h3 class="location-item__title"><?php echo __($title) ?></h3>
            </div>
            <?php if ($link) : ?>
                <?php
                printf(
                    '<a class="dps-dark-btn location-item__cta" href="%1$s" target="%2$s">%3$s</a>',
                    $link['url'],
                    $link['target'],
                    $link['title']
                );
                ?>
            <?php endif; ?>
        </li>
    <?php
    }
    echo '</ul>';
    ?>
</div>