<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'project_items';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$projects = ACF::getRowsLayout('project_items', $data);
?>

<div class="<?php echo esc_attr($className); ?>" data-aos="fade-up" data-aos-delay="500">
    <?php foreach ($projects as $item) {
        $title = ACF::getField('item_title', $item);
        $content = ACF::getField('item_content', $item);
        $image = ACF::getField('item_image', $item);
        $img_src = wp_get_attachment_image_src($image, 'full');

        echo '<div class="item_card">';
        echo '<div class="item_image" style="background-image: url(' . $img_src[0] . '); "></div>';
        echo '<div class="item_content">';
        echo '<div class="item_title"><h3>' . __($title) . '</h3></div>';
        echo '<div class="item_copy">' . __($content) . '</div>';
        echo '</div>';
        echo '</div>';
    } ?>
</div>