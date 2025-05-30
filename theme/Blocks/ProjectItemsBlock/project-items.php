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
$post_per_page = ACF::getField('post_per_page', $data);
$projects = get_field('project_item_type');

?>

<div class="<?php echo esc_attr($className); ?>" data-aos="fade-up" data-aos-delay="500">
    <?php if (!empty($projects)) : ?>
        <?php foreach ($projects as $item) :
            $title = $item->post_title;
            $post_id = $item->ID;
            $post = get_post($post_id);
            $content = apply_filters('the_content', $post->post_content);
            $img_src = get_the_post_thumbnail_url($post_id, 'full');
        ?>
            <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="item_link">
                <div class="item_card">
                    <div class="item_image" style="background-image: url('<?php echo esc_url($img_src); ?>');"></div>
                    <div class="item_content">
                        <div class="item_title">
                            <h3><?php echo esc_html($title); ?></h3>
                        </div>
                        <?php echo esc_html(wp_strip_all_tags($content)); ?>
                    </div>
                </div>
            </a>

        <?php endforeach; ?>
    <?php endif; ?>
</div>