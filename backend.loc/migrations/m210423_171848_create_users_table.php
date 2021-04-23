<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210423_171848_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull()
        ]);

        $this->insert('{{%users}}', [
            'email' => 'admin@backend.loc',
            'password' => Yii::$app->getSecurity()
                ->generatePasswordHash('qweqwe')
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
