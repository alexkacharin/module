<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="row" data-key="<?=$category[$widget->idField]?>">
    <div class="col-lg-6 col-xs-6">
        <input type="hidden" name="ids[]" value="<?=$category[$widget->idField];?>" />
            <?=$category[$widget->idField];?>.
        <?php if($category['childs']) { ?>
            <?=Html::a($category['title'], '#', ['title' => 'Показать\скрыть подкатегории', 'class' => 'pistol88-tree-toggle']);?>
        <?php } else { ?>
            <strong><?=$category['title']?></strong>
        <?php } ?>
    </div>

</div>
