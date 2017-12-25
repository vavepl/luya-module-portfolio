<?php

namespace vavepl\portfolio\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Item.
 * 
 * File has been created with `crud/create` command on LUYA version 1.0.0. 
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property string $link
 * @property integer $img_max_id
 * @property integer $img_min_id
 * @property smallint $is_active
 * @property integer $priority
 */
class Item extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public $i18n = ['name', 'description', 'color', 'link'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_item';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-portfolio-item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'group_id' => Yii::t('app', 'Group'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'color' => Yii::t('app', 'Color'),
            'link' => Yii::t('app', 'Link'),
            'img_max_id' => Yii::t('app', 'Portfolio img'),
            'img_min_id' => Yii::t('app', 'Logo img'),
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
            [['group_id', 'img_max_id', 'img_min_id', 'is_active', 'priority'], 'integer'],
            [['name', 'description', 'color', 'link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['name', 'description', 'color', 'link'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'group_id' => [
                'selectModel',
                'modelClass' => Group::className(),
                'valueField' => 'id',
                'labelField' => 'group_name'
            ],
            'name' => 'text',
            'description' => 'text',
            'color' => 'color',
            'link' => 'text',
            'img_max_id' => 'image',
            'img_min_id' => 'image',
            'is_active' => ['selectArray', 'data' => ['No', 'Yes']],
            'priority' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['group_id', 'name', 'description', 'color', 'link', 'img_max_id', 'img_min_id', 'is_active', 'priority']],
            [['create', 'update'], ['group_id', 'name', 'description', 'color', 'link', 'img_max_id', 'img_min_id', 'is_active', 'priority']],
            ['delete', false],
        ];
    }

    public static function getElements(){
        $elements = self::find()->where(['is_active' => 1])->orderBy(['priority' => SORT_ASC])->all();
        $data = [];
        foreach ($elements as $key=>$element) {
            $data[$key] = $element;
            $data[$key]['img_min_id'] = \Yii::$app->storage->getImage($element['img_min_id']);
            $data[$key]['img_max_id'] = \Yii::$app->storage->getImage($element['img_max_id']);
        }
        return $data;
    }

    public function getGroup(){
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

}