<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\kacharin\faq\models\FaqArticletocategory */

$this->title = 'Создание зависимости статей и категорий';
$this->params['breadcrumbs'][] = ['label' => 'Faq Articletocategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-articletocategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
