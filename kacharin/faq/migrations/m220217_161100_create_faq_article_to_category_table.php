<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%faq_article_to_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%faq_article}}`
 * - `{{%faq_category}}`
 */
class m220217_161100_create_faq_article_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%faq_article_to_category}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            '{{%idx-faq_article_to_category-article_id}}',
            '{{%faq_article_to_category}}',
            'article_id'
        );

        // add foreign key for table `{{%faq_article}}`
        $this->addForeignKey(
            '{{%fk-faq_article_to_category-article_id}}',
            '{{%faq_article_to_category}}',
            'article_id',
            '{{%faq_article}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-faq_article_to_category-category_id}}',
            '{{%faq_article_to_category}}',
            'category_id'
        );

        // add foreign key for table `{{%faq_category}}`
        $this->addForeignKey(
            '{{%fk-faq_article_to_category-category_id}}',
            '{{%faq_article_to_category}}',
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
        // drops foreign key for table `{{%faq_article}}`
        $this->dropForeignKey(
            '{{%fk-faq_article_to_category-article_id}}',
            '{{%faq_article_to_category}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            '{{%idx-faq_article_to_category-article_id}}',
            '{{%faq_article_to_category}}'
        );

        // drops foreign key for table `{{%faq_category}}`
        $this->dropForeignKey(
            '{{%fk-faq_article_to_category-category_id}}',
            '{{%faq_article_to_category}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-faq_article_to_category-category_id}}',
            '{{%faq_article_to_category}}'
        );

        $this->dropTable('{{%faq_article_to_category}}');
    }
}
