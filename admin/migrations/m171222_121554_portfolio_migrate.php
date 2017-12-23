<?php

use yii\db\Migration;

/**
 * Class m171222_121554_portfolio_migrate
 */
class m171222_121554_portfolio_migrate extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('portfolio_group', [
            'id' => $this->primaryKey(),
            'group_name' => $this->string(255),
            'is_active' => $this->boolean()->defaultValue(false),
            'priority' => $this->integer(11),
        ]);

        $this->createTable('portfolio_item', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(11),
            'name' => $this->string(255),
            'description' => $this->string(255),
            'color' => $this->string(255),
            'link' => $this->string(255)->null(),
            'img_max_id' => $this->integer(11),
            'img_min_id' => $this->integer(11),
            'is_active' => $this->boolean()->defaultValue(false),
            'priority' => $this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('portfolio_item');
        $this->dropTable('portfolio_group');

    }
}
