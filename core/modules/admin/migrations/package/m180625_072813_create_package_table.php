<?php

use yii\db\Migration;

/**
 * Handles the creation of table `package`.
 */
class m180625_072813_create_package_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('package', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('package');
    }
}
