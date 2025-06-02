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
$term_id = !empty($data['project_category_type']) ? $data['project_category_type'] : null;

if ($term_id) {
    $term_slug = get_term($term_id, 'project-type')->slug;
} else {
    $term_slug = 'graphic-design';
}

$card_app_bg = ACF::getField('project_background_color', $data);
$post_id = !empty($data['post_id']) ? $data['post_id'] : null;

$args = array(
    'post_type'      => 'project',
    'posts_per_page' => $post_per_page,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

if ($term_id) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'project-type',
            'field'    => 'slug',
            'terms'    => $term_slug,
        ),
    );
}

if (empty($projects)) {
    $projects_query = new WP_Query($args);
}
?>

<div class="<?php echo esc_attr($className); ?>" data-aos="fade-up" data-aos-delay="500">
    <?php if (!empty($projects_query) && $projects_query->have_posts()) : ?>
        <?php while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
            <?php
            $title = get_the_title();
            $post_id = get_the_ID();
            $content = apply_filters('the_content', get_the_content());
            $img_src = get_the_post_thumbnail_url($post_id, 'full');
            $card_app_bg = get_field('project_background_color', $post_id);
            ?>
            <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="item_link">
                <div class="item_card">
                    <div class="item_image" style="background-image: url('<?php echo esc_url($img_src) ?>'); background-color: <?php echo esc_attr($card_app_bg) ?>;"></div>
                    <div class="item_content">
                        <div class="item_title">
                            <h3><?php echo esc_html($title); ?></h3>
                        </div>
                        <?php echo esc_html(wp_strip_all_tags($content)); ?>
                    </div>
                </div>
            </a>
        <?php endwhile;
        wp_reset_postdata(); ?>
    <?php else : ?>

    <?php endif; ?>
</div>