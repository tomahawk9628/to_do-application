<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tlist}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m210428_082320_create_tlist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tlist}}', [
            'id' => $this->primaryKey(),
            'u_id' => $this->integer()->notNull(),
            'task' => $this->string(500)->notNull(),
            'done' => $this->boolean()->defaultValue(false),
        ]);

        // creates index for column `u_id`
        $this->createIndex(
            '{{%idx-tlist-u_id}}',
            '{{%tlist}}',
            'u_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-tlist-u_id}}',
            '{{%tlist}}',
            'u_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-tlist-u_id}}',
            '{{%tlist}}'
        );

        // drops index for column `u_id`
        $this->dropIndex(
            '{{%idx-tlist-u_id}}',
            '{{%tlist}}'
        );

        $this->dropTable('{{%tlist}}');
    }
}
