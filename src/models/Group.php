<?php

namespace vavepl\portfolio\models;

use luya\admin\traits\SortableTrait;
use Yii;
use luya\admin\ngrest\base\NgRestModel;
use yii\helpers\ArrayHelper;

/**
 * Group.
 * 
 * File has been created with `crud/create` command on LUYA version 1.0.0. 
 *
 * @property integer $id
 * @property string $group_name
 * @property smallint $is_active
 * @property integer $priority
 */
class Group extends NgRestModel
{
    use SortableTrait;
    /**
     * @inheritdoc
     */
    public $i18n = ['group_name'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_group';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-portfolio-group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'group_name' => Yii::t('app', 'Group Name'),
            'is_active' => Yii::t('app', 'Is Active'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'priority'], 'integer'],
            [['group_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['group_name'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'group_name' => 'text',
            'is_active' => ['toggleStatus', 'initValue' => 0],
            'priority' => 'sortable',
        ];
    }

    /**
     * @return string
     */
    public static function sortableField(){
        return 'priority';
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['group_name', 'is_active', 'priority']],
            [['create', 'update'], ['group_name', 'is_active', 'priority']],
            ['delete', false],
        ];
    }

    /**
     * @return array
     */
    public static function getMenu(){
        return ArrayHelper::map(self::find()->where(['is_active' => 1])->all(), 'id', 'group_name');
    }
}