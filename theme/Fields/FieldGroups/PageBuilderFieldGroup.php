<?php

namespace wp_tailwind\theme\Fields\FieldGroups;

use wp_tailwind\theme\Fields\Layouts\Image;
use wp_tailwind\theme\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\FlexibleContent;

/**
 * Class PageBuilderFieldGroup
 *
 * @package wp_tailwind\theme\Fields\PageBuilderFieldGroup
 */
class PageBuilderFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_extended_field_group([
            'title'    => __('Page Builder', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('page_template', 'templates/page-builder.php'),
                Location::if('post_type', 'project')
            ],
            'style' => 'default'
        ]);
    }

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    public function getFields()
    {
        return apply_filters('mc/field-group/page-builder/fields', [
            FlexibleContent::make(__('Modules', 'dps-starter'))
                ->buttonLabel(__('Add Module', 'dps-starter'))
                ->layouts([
                    (new Image())->fields(),
                ])
        ]);
    }
}
