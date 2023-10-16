<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'hero-content';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$image = ACF::getField('hero_content_image', $data);
$img_src = wp_get_attachment_image_src($image, 'large');
?>

<div class="<?php echo esc_attr($className); ?> flex flex-col-reverse lg:flex-row">
    <div class="hero-content_content ">
        <?php
        printf(
            '
            <div>
                <h1 class="hero-content-title">%1$s</h1>
                <p class="hero-content-copy">%2$s</p>
            </div>
        ',
            $title = ACF::getField('hero_content_title', $data),
            $content = ACF::getField('hero_content_copy', $data),
        );
        ?>
    </div>
    <div class="hero-content_image " style="background-image: url('<?php echo $img_src[0] ?>');">
    </div>
</div>