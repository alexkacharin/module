<?php


use app\assets\AppAsset;
use app\kacharin\faq\assets\FaqAsset;
use app\kacharin\faq\componets\BootstrapLinkPager;
use app\kacharin\faq\models\FaqArticle;
use app\kacharin\faq\models\FaqArticletocategory;
use pistol88\tree\widgets\Tree;
use yii\bootstrap4\Button;
use yii\bootstrap4\Menu;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
//Tree::widget(['model' => $model,'updateUrl' => '/faq/article/category']);

?>
<?php FaqAsset::register($this); ?>
<div>

    <?= Html::a('Вопросник', ['/faq/article'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Категории', ['/faq/category'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Архив', ['/faq/default/archive'], ['class'=>'btn btn-primary']) ?>
    <?php
    $model = new \app\kacharin\faq\models\FaqCategory();
    $model2 = new \app\kacharin\faq\models\FaqArticle();
    $list = $model::find()->asArray()->all();
    $arr = $model::buildArray($list);
    $arr = $model::treeBuild($arr);
    print_r($arr);
    ?>
    <body>
    <?php
    $this->registerJs(
        "$('.list li').on('click', function(e) {
    e.stopPropagation();
    var subList = $(this).children('.sub-list');

    if (subList.hasClass('open')) {
        $(this).find('.sub-list').removeClass('open');
    } else {
        subList.addClass('open');
    }
    });", View::POS_READY,
        'my-button-handler'
    );
    ?>
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

                   <div  data-mdb-toggle="collapse" aria-expanded="false"
                      aria-controls="shortExampleAnswer1collapse" class="list-group-item list-group-item-action">
                       <div class="d-flex w-100 justify-content-between">
                           <h5 class="mb-1"><?= $article->title?></h5>
                       </div>
                       <?= Html::a(' 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                               <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                               <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                           </svg>', ['/faq/article/update', 'id' =>$article->id], [
                           'data' => [
                               'method' => 'post',
                           ],
                       ]) ?>
                       <?= Html::a(' 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                               <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                           </svg>', ['/faq/article/update-status', 'id' =>$article->id], [
                           'data' => [
                               'confirm' => 'Вы действительно хотите отправить статью в архив?',
                               'method' => 'post',
                           ],
                       ]) ?>
                       <?= Html::a(' 
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                               <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                               <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                           </svg>', ['delete', 'id' =>$article->id], [
                           'data' => [
                               'confirm' => 'Вы действительно хотите удалить статью?',
                               'method' => 'post',
                           ],
                       ]) ?>

                       <p>
                       Категория:
                       <?php
                       $model = FaqArticletocategory::find()->where(['article_id' => $article->id])->all();
                       foreach($model as $r){
                          $models = \app\kacharin\faq\models\FaqCategory::find()->where(['id' => $r->category_id])->all();;
                          foreach($models as $r)
                          {
                              echo "<a href='";
                              echo Url::to(['default/category?id='.$r->id.'.']);
                              echo " '> $r->title</a>";
                              echo "<br>";
                          }
                       }

                       ?>

                       <p>
                       <p class="mb-1">
                           <?= \yii\helpers\StringHelper::truncate($article->content,300,'...');?>
                       </p>
                       <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '<?= Url::toRoute(['/faq/article/view', 'id'=>$article->id]);?>'">Подробнее</button>


                   </div>

               </div>
                                <?php endforeach; ?>



               <nav aria-label="Постраничная навигация">



               </nav>
               <?php
               echo BootstrapLinkPager::widget([
                   'pagination' => $pagination,

               ]);
               ?>


    </body>
</div>
