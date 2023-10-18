<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'hero';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$link = ACF::getField('hero_group_hero_link', $data);
$image = ACF::getField('hero_group_hero_image', $data);
$img_src = wp_get_attachment_image_src($image, 'large');
?>

<div class="<?php echo esc_attr($className); ?>" data-aos="fade-up">
    <div class="hero_content">
        <?php
        printf(
            '
        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="500">%1$s</h1>
        <p class="hero-copy" data-aos="fade-up" data-aos-delay="700">%2$s</p>
        <a class="dps-light-btn" href="%3$s" target="%5$s" data-aos="fade-up" data-aos-delay="900">%4$s</a>
        ',
            $title = ACF::getField('hero_group_hero_title', $data),
            $content = ACF::getField('hero_group_hero_content', $data),
            $link['url'],
            $link['title'],
            $link['target'],
        );
        ?>
    </div>
    <div class="hero_image" data-aos="fade-up" data-aos-delay="1100">
        <?php
        printf(
            '<img src="%1$s" />',
            $img_src[0]
        );
        ?>
    </div>
</div>