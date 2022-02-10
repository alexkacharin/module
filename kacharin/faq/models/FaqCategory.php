<?php

namespace app\kacharin\faq\models;

use Yii;

/**
 * This is the model class for table "faq_category".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $title
 *
 * @property FaqArticle[] $faqArticles
 */
class FaqCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[FaqArticles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaqArticles()
    {
        return $this->hasMany(FaqArticle::className(), ['category_id' => 'id']);
    }
}
