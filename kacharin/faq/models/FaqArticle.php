<?php

namespace app\kacharin\faq\models;

use Yii;
use yii\data\Pagination;
use yii\db\Query;
use yii\helpers\ArrayHelper;

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
    public $category_ids;
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
            [[ 'category_ids','title', 'content'], 'required'],
            ['category_ids', 'safe'],
            [['content'], 'string'],
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
            'title' => 'Заголовок',
            'content' => 'Контент',
            'CategoryList' => 'Категории'
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

    public function getCategoryies()
    {
        return $this->hasMany(FaqCategory::className(), ['id' => 'category_id'])
            ->viaTable('faq_article_to_category', ['article_id' => 'id']);
    }
    public function getCategoryList()
    {
        $selectCategoryies = $this -> getCategoryies()->select('title')->asArray()->all();
        $array = ArrayHelper::getColumn($selectCategoryies,'title');
        $array = implode(', ', $array);
        return $array;
    }
    public function getSelectCategoryies()
    {
       $selectCategoryies = $this -> getCategoryies()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectCategoryies,'id');
    }
    public function saveCategories($categories)
    {
        if (is_array($categories))
        {
            $this->clearCurrentCategoryies();
            foreach ($categories as $category_id)
            {
                $category = FaqCategory::findOne($category_id);
                $this->link('categoryies',$category);

            }
        }

    }
    public function getCategoryArr()
    {
        $arr = FaqCategory::find()->asArray()->all();
        return $arr;
    }
    
    public function clearCurrentCategoryies()
    {
        FaqArticletocategory::deleteAll(['article_id'=>$this->id]);
    }



public function getArrays($array, $sub = 0)
    {
        $a = array();
        foreach ($array as $v) {
            if ($sub == $v['parent_id']) {
                $b = $this->getArrays($array, $v['id']);
                if (!empty($b)) {
                    $a[$v['id']] = $v;
                    $a[$v['id']]['children'] = $b;
                } else {
                    $a[$v['id']] = $v;
                }
            }
        }
        return $a;
    }

    public static function out_options($array, $selected_id = 0, $level = 0)
    {
        $level++;
        $out = '';
        foreach ($array as $i => $row) {
            $out .= '<option value="' . $row['id'] . '"';
            if ($row['id'] == $selected_id) {
                $out .= ' selected';
            }
            $out .= '>';
            if ($level > 1) {
                $out .= str_repeat('-', $level - 1);
            }
            $out .= $row['title'] . '</option>';
            if (!empty($row['children'])) {
                $out .= $this->out_options($row['children'], $selected_id, $level);
            }
        }
        return $out;
    }

    /**
     * Возвращает массив всех категорий каталога в виде дерева
     */

    public function save($runValidation = true,$attributeNames = null)
    {

        parent::Save();
        $this->clearCurrentCategoryies();

          foreach($this->category_ids as $category_id)
        {
            $category = FaqCategory::findOne($category_id);
            $this->link('categoryies',$category);

        }

    }
    public function getSearchResult($search)
    {
        $array = [];
        $query = self::find()->where(['like', 'title', $search])->all();
            foreach ($query as $r) {
                array_push($array, $r->id);
            }


    return $array;
    }


    /**
     * Вспомогательная функция, очищает строку поискового запроса с сайта
     * от всякого мусора
     */
    protected function cleanSearchString($search) {
        $search = iconv_substr($search, 0, 64);
        // удаляем все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        // сжимаем двойные пробелы
        $search = preg_replace('#\s+#u', ' ', $search);
        $search = trim($search);
        return $search;
    }


}
