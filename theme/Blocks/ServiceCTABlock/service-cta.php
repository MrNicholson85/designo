<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'service-cta';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$service_cta = ACF::getRowsLayout('service_cta', $data);
?>

<div class="<?php echo esc_attr($className); ?>" data-aos="fade-up">
    <?php
    foreach ($service_cta as $ctas) {
        $image = ACF::getField('cta_image', $ctas);
        $link = ACF::getField('cta_link', $ctas);
        $img_src = wp_get_attachment_image_src($image, 'full');

        echo '<div class="service-cta__cta" style="background-image: url(' . $img_src[0] . ')" data-aos="fade-up">';
        printf(
            '
                <h2>%1$s</h2>
                <a href="%2$s" target="%3$s">View Projects <img src="' . DPS_DIR_URI . '/assets/img/right-chevron.svg" /></a>
            ',
            $link['title'],
            $link['url'],
            $link['target']
        );
        echo '</div>';
    }
    ?>
</div>