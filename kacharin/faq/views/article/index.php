<?php

use app\kacharin\faq\models\FaqArticle;
use app\kacharin\faq\models\FaqCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\kacharin\faq\models\search\FaqArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список статей';
$this->params['breadcrumbs'][] = $this->title;
$model = new FaqArticle();
?>
<div class="faq-article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Создать новую статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Категории' => 'categoryList',
            'title',
            'content:html',
            [
                'class' => ActionColumn::className(),
				'header'=>'Кнопки действия',
                'urlCreator' => function ($action, FaqArticle $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
            ],
        ],
    ]); ?>

</div>
