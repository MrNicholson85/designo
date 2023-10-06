<?php

namespace wp_tailwind\theme\Fields\Layouts;

use wp_tailwind\theme\Fields\ACF;
use WordPlate\Acf\Fields\Tab;

/**
 * Class Layouts
 *
 * @package wp_tailwind\theme\Fields\Layouts
 */
abstract class Layouts
{
    /**
     * Defines fields for layout.
     *
     * @return object
     */
    abstract public function fields();

    /**
     * Creates Content Tab Field.
     *
     * @return object
     */
    public function contentTab()
    {
        return Tab::make(__('Content', 'dps-starter'), 'content-tab')
            ->placement('left');
    }

    /**
     * Creates Options Tab Field.
     *
     * @return object
     */
    public function optionsTab()
    {
        return Tab::make(__('Options', 'dps-starter'), 'options-tab')
            ->placement('left');
    }

    /**
     * Creates a custom option tab
     * 
     * @return object
     */

    public function customOptionTab($label = 'Custom Tab')
    {
        return Tab::make(__($label, 'dps-starter'), $label . '-tab')
            ->placement('left');
    }
}
