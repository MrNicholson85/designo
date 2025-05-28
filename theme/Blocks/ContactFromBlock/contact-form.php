<?php

use wp_tailwind\theme\Fields\ACF;

$className = 'contact-form';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$data = $block['data'];
$contact_title = ACF::getField('block_title', $data);
$contact_copy = ACF::getField('block_content', $data);
$contact_id = ACF::getField('gravity_form_id', $data);
?>

<div class="<?php echo esc_attr($className); ?>" data-aos="fade-up">
    <div class="contact-form__content">
        <h2 data-aos="fade-up" data-aos-delay="200"><?php echo __($contact_title); ?></h2>
        <p data-aos="fade-up" data-aos-delay="300"><?php echo __($contact_copy); ?></p>
    </div>
    <div class="contact-form__form" data-aos="fade-up" data-aos-delay="400">
        <?php gravity_form($contact_id, false, false, false, '', false); ?>
    </div>
</div>