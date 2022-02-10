<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\kacharin\faq\models\FaqArticle */

$this->title = 'Create Faq Article';
$this->params['breadcrumbs'][] = ['label' => 'Faq Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
