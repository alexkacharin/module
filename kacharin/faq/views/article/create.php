<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\kacharin\faq\models\FaqArticle */

$this->title = 'Создание статьи';
$this->params['breadcrumbs'][] = ['label' => 'Faq Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
