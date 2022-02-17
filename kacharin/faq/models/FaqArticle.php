<?php

namespace app\kacharin\faq\models;

use Yii;

/**
 * This is the model class for table "faq_article".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 *
 * @property FaqCategory $category
 */
class FaqArticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content'], 'required'],
            [['category_id'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => FaqCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'title' => 'Заголовок',
            'content' => 'Контент',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getData()
    {
        return $this->hasOne(FaqCategory::className(), ['id' => 'category_id']);
    }

}
