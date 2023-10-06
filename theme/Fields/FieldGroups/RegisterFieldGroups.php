<?php

namespace wp_tailwind\theme\Fields\FieldGroups;

use wp_tailwind\theme\Interfaces\WordPressHooks;

/**
 * Class RegisterFieldGroups
 *
 * @package wp_tailwind\theme\Fields
 */
abstract class RegisterFieldGroups implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('acf/init', [$this, 'registerFieldGroup']);
    }

    /**
     * Register Field Group via WordPlate
     */
    abstract public function registerFieldGroup();

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    abstract public function getFields();
}
