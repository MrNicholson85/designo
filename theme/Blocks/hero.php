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

<div class="<?php echo esc_attr($className); ?>">
    <div class="hero_content">
        <?php
        printf(
            '
        <h1 class="hero-title">%1$s</h1>
        <p class="hero-copy">%2$s</p>
        <a class="dps-light-btn" href="%3$s" target="%5$s">%4$s</a>
        ',
            $title = ACF::getField('hero_group_hero_title', $data),
            $content = ACF::getField('hero_group_hero_content', $data),
            $link['url'],
            $link['title'],
            $link['target'],
        );
        ?>
    </div>
    <div class="">
        <?php
        printf(
            '<img class="m-0 p-0" src="%1$s" />',
            $img_src[0]
        );
        ?>
    </div>
</div>