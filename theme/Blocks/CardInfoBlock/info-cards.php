<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'info-cards';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$info_cards = ACF::getRowsLayout('info_cards', $data);
?>

<div class="<?php echo esc_attr($className); ?>">
    <?php
    echo '<ul class="info-cards__cards">';
    foreach ($info_cards as $key => $card) {
        $title = ACF::getField('card_item_title', $card);
        $copy = ACF::getField('card_item_content', $card);
        $image = ACF::getField('card_item_image', $card);
        $link = ACF::getField('card_item_link', $card);
        $img_src = wp_get_attachment_image_src($image, 'large');
    ?>
        <li class="info-cards__card-item" data-aos="fade-up" data-aos-delay="<?php echo $key + 1 . '00' ?>">
            <img class="info-cards__card-item-image" src="<?php echo esc_url($img_src[0]); ?>" />
            <div>
                <h3 class="info-cards__card-item-title" data-aos="fade-up" data-aos-delay="<?php echo $key + 2 . '00' ?>"><?php echo __($title) ?></h3>
                <?php if ($copy) : ?>
                    <div class="info-cards__card-item-copy" data-aos="fade-up" data-aos-delay="<?php echo $key + 3 . '00' ?>">
                        <?php echo apply_filters('the_content', $copy); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($link) : ?>
                <?php
                printf(
                    '<a class="dps-dark-btn" href="%1$s" target="%2$s">%3$s</a>',
                    $link['url'],
                    $link['target'],
                    $link['title']
                );
                ?>
            <?php endif; ?>
        </li>
    <?php
    }
    echo '</ul>';
    ?>
</div>