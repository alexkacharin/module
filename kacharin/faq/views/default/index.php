<?php


use yii\bootstrap4\Button;
use yii\bootstrap4\Menu;
use yii\bootstrap4\NavBar;
use yii\widgets\Nav;
use yii\helpers\Html;


?>
<div>

    <?= Html::a('Article', ['/faq/article'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Category', ['/faq/category'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('AricleToCategory', ['/faq/articletocategory'], ['class'=>'btn btn-primary']) ?>
</div>
