<?php

/* @var $this \yii\web\View */
/* @var $content string */


use app\kacharin\faq\assets\FaqAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

FaqAsset::register($this);
?>
<?php $this->beginPage() ?>
<?= $content ?>