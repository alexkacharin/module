<?php


namespace app\kacharin\faq\widgets\faqWidget;

use app\kacharin\faq\models\FaqArticle;
use Yii;
use yii\base\BaseObject;
use yii\base\Widget;
use yii\data\Pagination;
use yii\helpers\Html;

class FaqWidget extends Widget
{
    public $articles = null;
    public $pagination = null;
    public function init()
    {
        parent::init();

    }

    public function run()
    {

        if($this->articles) {
            $articles = $this->articles;
        }else
        {
            $articles = FaqArticle::find()->where(['status' => 1]);
        }
        $pagination = new Pagination(['totalCount' => $articles->count(), 'pageSize' => 10,'forcePageParam' => false, 'pageSizeParam' => false]);
        $articles = $articles->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }

}