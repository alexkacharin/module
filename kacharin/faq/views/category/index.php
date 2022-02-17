<?php

use app\kacharin\faq\models\FaqCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\kacharin\faq\models\search\FaqCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faq Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Faq Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'parent_id',
            'title',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FaqCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
			


        ],
    ]); ?>


</div>
