<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\kacharin\faq\models\FaqArticletocategory */

$this->title = 'Update Faq Articletocategory: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faq Articletocategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="faq-articletocategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
