<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'testimonial';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];

$title = ACF::getField('testimonial_group_title', $data);
$content = ACF::getField('testimonial_group_content', $data);
$author = ACF::getField('testimonial_group_author', $data);
$image = ACF::getField('testimonial_group_image', $data);
$img_src = wp_get_attachment_image_src($image, 'large');
?>
<div class="<?php echo esc_attr($className); ?>">
    <div class=" flex">
        <div class="block-content w-2/4">
            <h1 class="block-title"><?php echo $title ?></h1>
            <p class="m-0"><?php echo esc_html($content); ?></p>
            <span class=""><?php echo esc_html($author) ?></span>
        </div>
        <div class="w-2/4 h-[300px] bg-cover bg-no-repeat bg-center" style="background-image: url('<?php echo $img_src[0] ?>');">

        </div>
    </div>
</div>