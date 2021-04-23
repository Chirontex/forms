<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%forms}}`.
 */
class m210423_161502_create_forms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%forms}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'message' => $this->text()->notNull(),
            'assigned_to' => $this->integer()->unsigned()
        ]);

        $this->insert('{{%forms}}', [
            'first_name' => 'Иван',
            'last_name' => 'Иванов',
            'email' => 'ivan@test.loc',
            'phone' => '+7 (800) 555-25-25',
            'message' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.'
        ]);

        $this->insert('{{%forms}}', [
            'first_name' => 'Пётр',
            'last_name' => 'Петров',
            'email' => 'petr@test.loc',
            'phone' => '+7 (928) 524-34-54',
            'message' => 'Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.',
            'assigned_to' => 1
        ]);

        $this->insert('{{%forms}}', [
            'first_name' => 'Сидор',
            'last_name' => 'Сидоров',
            'email' => 'sidor@test.loc',
            'phone' => '+7 (908) 123-12-12',
            'message' => 'Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.'
        ]);

        $this->insert('{{%forms}}', [
            'first_name' => 'Тест',
            'last_name' => 'Тестов',
            'email' => 'test@test.loc',
            'phone' => '+7 (999) 999-99-99',
            'message' => 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад.',
            'assigned_to' => 1
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%forms}}');
    }
}
