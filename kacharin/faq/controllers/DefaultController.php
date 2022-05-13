<?php

namespace app\kacharin\faq\controllers;

use app\kacharin\faq\models\FaqArticle;
use app\kacharin\faq\models\FaqArticletocategory;
use Yii;
use yii\base\BaseObject;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Default controller for the `faq` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        $articles = FaqArticle::find()->where(['status' => 1]);
        $pagination = new Pagination(['totalCount' => $articles->count(), 'pageSize' => 10,'forcePageParam' => false, 'pageSizeParam' => false]);
        $articles = $articles->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }
    public function actionArchive()
    {
        $articles = FaqArticle::find()->where(['status' => 0]);
        $pagination = new Pagination(['totalCount' => $articles->count(), 'pageSize' => 10,'forcePageParam' => false, 'pageSizeParam' => false]);
        $articles = $articles->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('archive', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }
    /* ... */

    /**
     * Результаты поиска по каталогу товаров
     */
    public function actionSearch($query = '') {
        $array = (new FaqArticle())->getSearchResult($query);
        $articles = FaqArticle::findAll($array);
        $pagination = new Pagination(['totalCount' => count($articles)]);
        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }
    public function actionCategory($id) {
        $array = FaqArticletocategory::find()->where(['category_id' => $id])->all();
        $result = ArrayHelper::getColumn($array,'article_id');
        $articles = FaqArticle::findAll($result);
        $pagination = new Pagination(['totalCount' => count($articles)]);
        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }

}
