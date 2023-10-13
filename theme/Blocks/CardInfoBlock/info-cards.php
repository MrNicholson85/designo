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
    echo '<ul class="cards">';
    foreach ($info_cards as $card) {
        $title = ACF::getField('card_item_title', $card);
        $copy = ACF::getField('card_item_content', $card);
        $image = ACF::getField('card_item_image', $card);
        $link = ACF::getField('card_item_link', $card);
        $img_src = wp_get_attachment_image_src($image, 'large');
    ?>
        <li class="card-item">
            <img class="card-item__image" src="<?php echo esc_url($img_src[0]); ?>" />
            <div>
                <h3 class="card-item__title"><?php echo __($title) ?></h3>
                <?php if ($copy) : ?>
                    <div class="card-item__copy">
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