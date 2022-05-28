<?php


use app\assets\AppAsset;
use app\kacharin\faq\componets\BootstrapLinkPager;
use app\kacharin\faq\models\FaqArticle;
use app\kacharin\faq\models\FaqArticletocategory;
use pistol88\tree\widgets\Tree;
use yii\bootstrap4\Button;
use yii\bootstrap4\Menu;
use yii\bootstrap4\NavBar;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Nav;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
//Tree::widget(['model' => $model,'updateUrl' => '/faq/article/category']);

?>

<div>

    <?= Html::a('Вопросник', ['/faq/article'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Категории', ['/faq/category'], ['class'=>'btn btn-primary']) ?>
    <?php
    $this->beginPage();
    $model = new \app\kacharin\faq\models\FaqCategory();
    $model2 = new \app\kacharin\faq\models\FaqArticle();
    AppAsset::register($this);

    ?>

    <head>
        <meta charset="utf-8">
        <!-- Остальной код -->
        <?= $this->head() ?>
    </head>
    <?= $this->beginBody() ?>
    <body>
    <div class="col-sm-6">
        <form method="get" action="<?= Url::to(['default/search']); ?>" class="pull-right">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Поиск по статьям">
                <div class="input-group-btn">
                    <button class="btn btn btn-secondary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-magic" viewBox="0 0 16 16">
                            <path d="M9.5 2.672a.5.5 0 1 0 1 0V.843a.5.5 0 0 0-1 0v1.829Zm4.5.035A.5.5 0 0 0 13.293 2L12 3.293a.5.5 0 1 0 .707.707L14 2.707ZM7.293 4A.5.5 0 1 0 8 3.293L6.707 2A.5.5 0 0 0 6 2.707L7.293 4Zm-.621 2.5a.5.5 0 1 0 0-1H4.843a.5.5 0 1 0 0 1h1.829Zm8.485 0a.5.5 0 1 0 0-1h-1.829a.5.5 0 0 0 0 1h1.829ZM13.293 10A.5.5 0 1 0 14 9.293L12.707 8a.5.5 0 1 0-.707.707L13.293 10ZM9.5 11.157a.5.5 0 0 0 1 0V9.328a.5.5 0 0 0-1 0v1.829Zm1.854-5.097a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L8.646 5.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0l1.293-1.293Zm-3 3a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L.646 13.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0L8.354 9.06Z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php foreach($articles as $article):?>
    <article class="post">

        <div class="list-group w-100">

            <a href="#shortExampleAnswer1collapse" data-mdb-toggle="collapse" aria-expanded="false"
               aria-controls="shortExampleAnswer1collapse" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $article->title?></h5>
                </div>
                <button type="button" class="btn btn-secondary" onclick="window.location.href = '<?= Url::toRoute(['/faq/article/update', 'id'=>$article->id]);?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-magic" viewBox="0 0 16 16">
                        <path d="M9.5 2.672a.5.5 0 1 0 1 0V.843a.5.5 0 0 0-1 0v1.829Zm4.5.035A.5.5 0 0 0 13.293 2L12 3.293a.5.5 0 1 0 .707.707L14 2.707ZM7.293 4A.5.5 0 1 0 8 3.293L6.707 2A.5.5 0 0 0 6 2.707L7.293 4Zm-.621 2.5a.5.5 0 1 0 0-1H4.843a.5.5 0 1 0 0 1h1.829Zm8.485 0a.5.5 0 1 0 0-1h-1.829a.5.5 0 0 0 0 1h1.829ZM13.293 10A.5.5 0 1 0 14 9.293L12.707 8a.5.5 0 1 0-.707.707L13.293 10ZM9.5 11.157a.5.5 0 0 0 1 0V9.328a.5.5 0 0 0-1 0v1.829Zm1.854-5.097a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L8.646 5.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0l1.293-1.293Zm-3 3a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L.646 13.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0L8.354 9.06Z"></path>
                    </svg>
                </button>
                <p>
                    Категория:
                    <?php
                    $model = FaqArticletocategory::find()->where(['article_id' => $article->id])->all();
                    foreach($model as $r){
                        $models = \app\kacharin\faq\models\FaqCategory::find()->where(['id' => $r->category_id])->all();;
                        foreach($models as $r)
                        {
                            echo $r->title;
                            echo "<br>";
                        }
                    }

                    ?>

                <p>
                <p class="mb-1">
                    <?= \yii\helpers\StringHelper::truncate($article->content,300,'...');?>
                </p>
                <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '<?= Url::toRoute(['/faq/article/view', 'id'=>$article->id]);?>'">Подробнее</button>


            </a>

        </div>
        <?php endforeach; ?>



        <nav aria-label="Постраничная навигация">



        </nav>
        <?php
        echo BootstrapLinkPager::widget([
            'pagination' => $pagination,

        ]);
        ?>
        <?= $this->endBody() ?>

    </body>
    <?= $this->endPage() ?>
</div>
