<?php

use app\kacharin\faq\models\FaqArticletocategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\kacharin\faq\models\search\FaqArticletocategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зависимости статей от категорий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-articletocategory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать зависимость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'article_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FaqArticletocategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
