<?php

namespace app\kacharin\faq\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\kacharin\faq\models\FaqArticletocategory;

/**
 * FaqArticletocategorySearch represents the model behind the search form of `app\kacharin\faq\models\FaqArticletocategory`.
 */
class FaqArticletocategorySearch extends FaqArticletocategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'article_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = FaqArticletocategory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'article_id' => $this->article_id,
        ]);

        return $dataProvider;
    }
}
