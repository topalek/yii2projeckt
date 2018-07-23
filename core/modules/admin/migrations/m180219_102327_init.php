<?php

use yii\db\Migration;

/**
 * Class m180219_102327_init
 */
class m180219_102327_init extends Migration
{

    public function up()
    {
        $this->createTable('user', [
            'id'                   => $this->primaryKey(),
            'name'                 => $this->string()->notNull()->comment('Логин'),
            'email'                => $this->string()->notNull()->comment('E-mail'),
            'password'             => $this->string()->notNull()->comment('Пароль'),
            'status'               => $this->smallInteger()->defaultValue('0'),
            'auth_key'             => $this->string()->notNull(),
            'access_token'         => $this->string(),
            'password_reset_token' => $this->string(),
            'updated_at'           => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->comment('Дата обновления'),
            'created_at'           => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата создания'),
            'deleted_at'           => $this->timestamp()->comment('Дата удалення'),
        ]);


        $this->insert('user', [
            'id'       => 1,
            'name'     => 'Admin',
            'password' => '$2y$13$Xeho97wOCw5WNolYUQBsE.Y218re5K2kmPpZtH68TfstsJOnbfNFm',
            'email'    => 'admin@example.com',
            'status'   => 1,
            'auth_key' => 'NrmwHdntFKHOeTEXaWVCN0kZbeH4z97T',
        ]);

    }

    public function down()
    {
        $this->dropTable('user');
    }


}
