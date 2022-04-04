<?php

namespace app\kacharin\faq\controllers;

use app\kacharin\faq\models\FaqArticle;
use yii\data\Pagination;
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
        $articles = FaqArticle::find();
        $pagination = new Pagination(['totalCount' => $articles->count()]);
        $articles = $articles->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }
}
