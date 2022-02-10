<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%faq_article_to_category}}`.
 */
class m220201_205652_create_faq_article_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%faq_article_to_category}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'article_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%faq_article_to_category}}');
    }
}
