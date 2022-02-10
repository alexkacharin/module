<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\kacharin\faq\models\FaqArticle */

$this->title = 'Update Faq Article: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Faq Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="faq-article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
