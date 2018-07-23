<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180622_140324_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string()->notNull()->comment('Название'),
            'description' => $this->string()->comment('Описание'),
            'img'         => $this->string()->comment('Картинка'),
            'price'       => $this->integer()->comment('Цена'),
            'show_price'  => $this->smallInteger()->defaultValue(1)->comment('Показывать цену'),
            'status'      => $this->smallInteger()->defaultValue(1)->comment('Публиковать'),
            'updated_at'  => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->comment('Дата обновления'),
            'created_at'  => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
