<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery`.
 */
class m180906_130244_create_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'title'      => $this->string(255)->notNull()->comment('Заголовок'),
            'slug'       => $this->string(255)->notNull()->comment('Слаг'),
            'images'       => $this->text()->comment('Изображения'),
            'status'     => $this->smallInteger()->defaultValue(1)->comment('Опубликовано'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->comment('Дата обновления'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('gallery');
    }
}
