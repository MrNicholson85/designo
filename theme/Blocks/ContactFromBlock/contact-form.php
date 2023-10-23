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
$contact_title = ACF::getField('contact_title', $data);
$contact_copy = ACF::getField('contact_copy', $data);
$contact_id = ACF::getField('from_id', $data);
?>

<div class="<?php echo esc_attr($className); ?>" data-aos="fade-up">
    <div>
        <h2><?php echo __($contact_title); ?></h2>
        <p><?php echo __($contact_copy); ?></p>
    </div>
    <div>
        <?php gravity_form($contact_id, false, false, false, '', false); ?>

    </div>
</div>