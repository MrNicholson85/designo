<?php

namespace wp_tailwind\theme\Fields\Layouts;

use wp_tailwind\theme\Fields\Common;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\TrueFalse;

/**
 * Class Image
 *
 * @package wp_tailwind\theme\Fields\Layouts
 */
class Image extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/image',
            Layout::make('Image')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    WPImage::make('Image')
                        ->returnFormat('array'),
                    $this->customOptionTab('Module Options'),
                    Group::make('Background')
                        ->fields([
                            Textarea::make(__('Custom Background Color', 'dps-starter'), 'custom-bg')
                                ->rows(1),
                            TrueFalse::make(__('Full Width Image', 'dps-starter'))
                                ->stylisedUi(),
                        ])
                        ->wrapper([
                            'width' => '50%'
                        ]),
                    Group::make(__('Settings', 'dps-starter'))
                        ->fields([
                            Common::marginGroup()
                        ])
                        ->wrapper([
                            'width' => '50%'
                        ])
                ])
        );
    }
}
