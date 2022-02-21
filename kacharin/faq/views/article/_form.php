<?php

use app\kacharin\faq\models\FaqCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\kacharin\faq\models\FaqArticle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'category_id[]')
    ->dropDownList(ArrayHelper::map(FaqCategory::find()->all(), 'id', 'title'),
    [
    'multiple'=>'multiple',
    ]
    )->label("Выберите категорию...");?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
