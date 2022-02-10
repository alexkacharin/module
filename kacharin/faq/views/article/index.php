<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\kacharin\faq\models\search\FaqArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faq Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Faq Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'category_id',
            'title',
            'content:ntext',
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
