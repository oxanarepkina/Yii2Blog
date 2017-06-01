<?php

use yii\db\Migration;

/**
 * Handles the creation of table `groups`.
 */
class m170531_123019_create_groups_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('groups', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'activity' => "ENUM('active', 'inactive')"
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('groups');
    }
}
