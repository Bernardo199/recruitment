<?php

use yii\db\Migration;

/**
 * Class m221008_171151_crete_contact_table
 */
class m221008_171151_crete_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'countrycodes' => $this->string()->notNull(),
            'number' => $this->string(9)->notNull()->unique(),
            'people_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),

        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-contact-people_id',
            'contact',
            'people_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-contact-people_id',
            'contact',
            'people_id',
            'people',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221008_171151_crete_contact_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221008_171151_crete_contact_table cannot be reverted.\n";

        return false;
    }
    */
}