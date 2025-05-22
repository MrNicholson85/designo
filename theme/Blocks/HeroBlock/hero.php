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
$title = ACF::getField('hero_title', $data);
$content = ACF::getField('hero_content', $data);
$link = ACF::getField('hero_cta', $data);
$image = ACF::getField('hero_image', $data);
$img_src = wp_get_attachment_image_src($image, 'large');
?>

<div class="<?php echo esc_attr($className); ?>">
    <div class="hero__content">
        <?php
        echo '<h1 class="hero__content-title" data-aos-delay="500">' . $title . '</h1>';
        echo '<p class="hero__content-copy" data-aos-delay="700">' . $content . '</p>';
        if ($link) {
            echo '<div data-aos-delay="900"><a class="dps-light-btn" href="' . $link['url'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a></div>';
        }
        ?>
    </div>
    <?php if ($image) : ?>
        <div class="hero__image" data-aos-delay="1100">
            <?php
            printf(
                '<img src="%1$s" />',
                $img_src[0]
            );
            ?>
        </div>
    <?php endif; ?>
</div>