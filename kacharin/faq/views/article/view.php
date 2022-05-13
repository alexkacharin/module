<?php

use app\kacharin\faq\models\FaqCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\kacharin\faq\models\FaqArticle */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="faq-article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Отправить статью в архив', ['/faq/article/update-status', 'id' =>$model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите отправить статью в архив?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?=
            $model->content;
   ?>

</div>
