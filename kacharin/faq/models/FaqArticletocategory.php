<?php

namespace app\kacharin\faq\models;

use Yii;

/**
 * This is the model class for table "faq_article_to_category".
 *
 * @property int $id
 * @property int $category_id
 * @property int $article_id
 */
class FaqArticletocategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_article_to_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'article_id'], 'required'],
            [['category_id', 'article_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'category_id' => 'Номер категории',
            'article_id' => 'Номер статьи',
        ];
    }
}
