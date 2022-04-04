<?php


use pistol88\tree\widgets\Tree;
use yii\bootstrap4\Button;
use yii\bootstrap4\Menu;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Nav;
use yii\helpers\Html;


?>
<div>

    <?= Html::a('Article', ['/faq/article'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Category', ['/faq/category'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('AricleToCategory', ['/faq/articletocategory'], ['class'=>'btn btn-primary']) ?>
    <?php
    $model = new \app\kacharin\faq\models\FaqCategory();
    ?>


     <?php foreach($articles as $article):?>
           <article class="post">
                        <div class="post-thumb">
                            <a href="<?= Url::toRoute(['/faq/article/view', 'id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">View Post</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">

                            </header>
                            <div class="entry-content">
                                <p><?= $article->title?>
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">

                                </div>
                            </div>
                                <?php endforeach; ?>




                                <?php
                                echo LinkPager::widget([
                                    'pagination' => $pagination,
                                ]);
                                ?>
</div>
