<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180219_104148_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post', [
            'id'         => $this->primaryKey(),
            'title'      => $this->string(255)->notNull()->comment('Заголовок'),
            'slug'       => $this->string(255)->notNull()->comment('Слаг'),
            'text'       => $this->text()->comment('Короткий текст'),
            'content'    => $this->text()->comment('Контент'),
            'status'     => $this->smallInteger()->defaultValue(1)->comment('Опубликовано'),
            'user_id'     => $this->integer()->notNull()->defaultValue(1)->comment('Автор'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->comment('Дата обновления'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания'),
        ]);

        $this->addForeignKey('fk_user','post','user_id','user','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_user','post');
        $this->dropTable('post');
    }
}
