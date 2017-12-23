<?php

namespace vavepl\portfolio\admin;

/**
 * Portfolio Admin Module.
 *
 * File has been created with `module/create` command on LUYA version 1.0.0. 
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-portfolio-group' => 'vavepl\portfolio\admin\apis\GroupController',
        'api-portfolio-item' => 'vavepl\portfolio\admin\apis\ItemController',
    ];

    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node('Portfolio', 'image')
            ->group('Navigation')
            ->itemApi('Groups', 'portfolioadmin/group/index', 'label', 'api-portfolio-group')
            ->itemApi('Items', 'portfolioadmin/item/index', 'label', 'api-portfolio-item');
    }
}