<?php

namespace vavepl\portfolio\admin\apis;

/**
 * Item Controller.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0.
 */
class ItemController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'vavepl\portfolio\models\Item';
}