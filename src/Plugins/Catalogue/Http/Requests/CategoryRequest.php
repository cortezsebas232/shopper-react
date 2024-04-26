<?php

namespace Mckenziearts\Shopper\Plugins\Catalogue\Http\Requests;

use Mckenziearts\Shopper\Http\Requests\BaseRequest;

class CategoryRequest extends BaseRequest
{
    /**
     * @return bool
     */
    public function wantsJson()
    {
        return true;
    }

    /**
     * Rules for creating a new resource
     *
     * @var array
     */
    public $storeRules = [
        'name' => 'required|max:255',
        'slug' => 'max:255|unique:shopper_catalogue_categories',
    ];

    /**
     * Return update rules
     *
     * @return array
     */
    public function getUpdateRules()
    {
        return [
            'name'  => 'sometimes|required|max:255',
            'slug'  => 'sometimes|max:255|unique:shopper_catalogue_categories,id,' . $this->get('id'),
        ];
    }
}
