<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'slick-slider';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data']['image_slider'];
$slides = ACF::getRowsLayout('image_slider', $data);
?>
<div class="<?php echo esc_attr($className); ?> dps-container mb-8">
    <div class="swiper">
        <ul class="swiper-wrapper mb-0 mt-0 pl-0">
            <?php
            foreach ($data as $slide) {
                $img_src = wp_get_attachment_image_src($slide, 'large');
                printf(
                    '<li class="swiper-slide pl-0 mb-0 mt-0"><img class="w-full m-0" src="%1$s" /></li>',
                    $img_src[0],
                );
            }
            ?>
        </ul>
    </div>
</div>