<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170531_124413_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'date' => $this->date(),
            'description' => $this->text(),
            'group' => $this->integer()->notNull(),
            'activity' => "ENUM('active', 'inactive')"
        ]);

        // creates index for column `group`
        $this->createIndex(
            'idx-news-group',
            'news',
            'group'
        );

        // add foreign key for table `group`
        $this->addForeignKey(
            'idx-news-group',
            'news',
            'group',
            'groups',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');

        // drops foreign key for table `group`
        $this->dropForeignKey(
            'fk-news-group',
            'news'
        );

        // drops index for column `group`
        $this->dropIndex(
            'fk-news-group',
            'news'
        );
    }
}
