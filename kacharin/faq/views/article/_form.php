<?php


use app\kacharin\faq\componets\CategoryWidget;
use app\kacharin\faq\models\FaqArticle;
use app\kacharin\faq\models\FaqCategory;

use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
//$form->field($model, 'category_id')->dropDownList($items, $params)
/* @var $this yii\web\View */
/* @var $model app\kacharin\faq\models\FaqArticle */
/* @var $form yii\widgets\ActiveForm */
$model2 = new FaqCategory();
?>



<?php $form = ActiveForm::begin(); ?>
<?php
// при редактировании существующей категории нельзя допустить, чтобы
// в качестве родителя была выбрана эта же категория или ее потомок
$exclude = 0;
if (!empty($model->id)) {
    $exclude = $model->id;
}
$parents = FaqCategory::getTree($exclude, true);
$selectedCategories = $model->getSelectCategoryies();

?>
<?= Html::dropDownList('categories',$selectedCategories,$parents,['class'=>'form-control','multiple'=>true])?>
<?= $form->field($model, 'title')->textarea(['rows' => 1]) ?>
<?=

$form->field($model, 'content')->widget(CKEditor::className(), [
    'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false,
        ]),
])
?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
