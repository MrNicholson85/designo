<?php

use wp_tailwind\theme\Fields\ACF;
use wp_tailwind\theme\Media;

$className = 'cards';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$cards = ACF::getRowsLayout('cards', $data);
?>
<div class="<?php echo esc_attr($className); ?> dps-container mb-[40px]">
    <div class="sm:grid md:flex justify-between gap-8">
        <?php
        foreach ($cards as $card) {

            $image = ACF::getField('card_image', $card);
            $img_src = wp_get_attachment_image_src($image, 'large');
            printf(
                '<div class="sm:bg-[#0ff] lg:bg-[#c5c5c5] w-full text-center rounded-lg">
                    <div class="h-[200px] rounded-t-lg bg-cover bg-no-repeat bg-center" style="background-image: url(%6$s);"></div>
                    <div class="p-8">
                    <h3 class="m-0">%1$s</h3>
                    <p class="m-0">%2$s</p>
                    <a hreft="%4$s" targert="%5$s">%3$s</a>
                    </div>
                </div>',
                $card['title'],
                $card['content'],
                $card['link']['title'],
                $card['link']['url'],
                $card['link']['target'],
                $img_src[0]
            );
        }
        ?>
    </div>
</div>