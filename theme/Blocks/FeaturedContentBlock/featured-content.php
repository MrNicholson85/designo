<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'featured-content';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$image = ACF::getField('featured_content_image', $data);
$img_src = wp_get_attachment_image_src($image, 'large');
$image_placement = ACF::getField('image_placement', $data);
$title = ACF::getField('featured_content_title', $data);
$copy = ACF::getField('featured_content_copy', $data);
$flexClass = "";
$contentPadding = "";

if ($image_placement === '1') {
    $contentPadding = 'lg:pr-[95px]';
} else {
    $contentPadding = 'lg:pl-[95px]';
}

if ($image_placement === '1') {
    $flexClass = 'flex-col';
} else {
    $flexClass = 'flex-col-reverse';
}
?>

<div class="<?php echo esc_attr($className); ?> flex <?php echo $flexClass; ?> lg:flex-row" data-aos="zoom-in" data-aos-delay="500">
    <?php if ($image_placement === '1') : ?>
        <div class="featured-content_image" data-aos="fade-up" data-aos-delay="600" style="background-image: url('<?php echo $img_src[0] ?>');">
        </div>
    <?php endif; ?>
    <div class="featured-content_content <?php echo $contentPadding ?>">
        <?php if ($title) : ?>
            <h2 data-aos="fade-up" data-aos-delay="700"><?php echo __($title); ?></h2>
        <?php endif; ?>
        <div data-aos="fade-up" data-aos-delay="800">
            <?php echo apply_filters('the_content', $copy) ?>
        </div>
    </div>
    <?php if ($image_placement === '') : ?>
        <div class="featured-content_image " style="background-image: url('<?php echo $img_src[0] ?>');">
        </div>
    <?php endif; ?>
</div>