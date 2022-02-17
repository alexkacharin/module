<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%faq_article}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%faq_category}}`
 */
class m220217_161055_create_faq_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%faq_article}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-faq_article-category_id}}',
            '{{%faq_article}}',
            'category_id'
        );

        // add foreign key for table `{{%faq_category}}`
        $this->addForeignKey(
            '{{%fk-faq_article-category_id}}',
            '{{%faq_article}}',
            'category_id',
            '{{%faq_category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%faq_category}}`
        $this->dropForeignKey(
            '{{%fk-faq_article-category_id}}',
            '{{%faq_article}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-faq_article-category_id}}',
            '{{%faq_article}}'
        );

        $this->dropTable('{{%faq_article}}');
    }
}
