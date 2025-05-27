<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

// Construct the class name for the container
$className = 'info-cards ' . ($block['className'] ?? '') . (!empty($block['align']) ? ' align' . $block['align'] : '');

// Safely get the data, defaulting to an empty array if not set
$data = $block['data'] ?? [];
// Retrieve the info cards data using ACF's getRowsLayout method
$info_cards = ACF::getRowsLayout('info_cards', $data);
$animation = ACF::getField('block_animation', $data);
?>

<div class="<?php echo esc_attr(trim($className)); ?> <?php echo $animation ?>">
    <ul class="info-cards__cards">
        <?php foreach ($info_cards as $key => $card) : ?>
            <?php
            // Retrieve individual fields from the ACF card data
            $title = ACF::getField('card_item_title', $card);
            $copy = ACF::getField('card_item_content', $card);
            $image = ACF::getField('card_item_image', $card);
            $link = ACF::getField('card_item_link', $card);
            // Get the image source URL
            $img_src = wp_get_attachment_image_src($image, 'large');
            ?>
            <li class="info-cards__card-item" data-aos-delay="<?php echo ($key + 1) . '00'; ?>">
                <!-- Display the image -->
                <img class="info-cards__card-item-image" src="<?php echo esc_url($img_src[0]); ?>" alt="<?php echo esc_attr($title); ?>">
                <div class="info-cards__card-item-copy-wrapper">
                    <!-- Display the title -->
                    <h3 class="info-cards__card-item-title" data-aos-delay="<?php echo ($key + 2) . '00'; ?>">
                        <?php echo esc_html($title); ?>
                    </h3>
                    <!-- Display the content if available -->
                    <?php if ($copy) : ?>
                        <div class="info-cards__card-item-copy" data-aos-delay="<?php echo ($key + 3) . '00'; ?>">
                            <?php echo apply_filters('the_content', $copy); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Display the link if available -->
                <?php if ($link) : ?>
                    <a class="dps-dark-btn" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>