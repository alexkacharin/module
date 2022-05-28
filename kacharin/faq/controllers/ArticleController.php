<?php

namespace app\kacharin\faq\controllers;

use app\kacharin\faq\models\FaqArticle;
use app\kacharin\faq\models\FaqCategory;
use app\kacharin\faq\models\search\FaqArticleSearch;
use app\kacharin\faq\Module;
use app\kacharin\faq\widgets\faqWidget\FaqWidget;
use Yii;
use yii\base\BaseObject;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for FaqArticle model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index','create','update','delete','update-status'],
                'denyCallback' => function () {
                    die('Доступ запрещен!');
                },
                'rules' => [
                    [
                        'allow'   => true,
                        'roles'   => Module::accessRoles,
                    ],
                ],
            ],
        ];

    }

    /**
     * Lists all FaqArticle models.
     *
     * @return string
     */

    public function actionIndex()
    {

        $searchModel = new FaqArticleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $pagination = 3;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single FaqArticle model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FaqArticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new FaqArticle();

        if ($this->request->isPost) {
            $model->category_ids =  Yii::$app->request->post('categories');
            if ($model->load($this->request->post()) && $model->save(true)) {
                return $this->redirect(['view', 'id' => $model->id]);

            }
        } else {

            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FaqArticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $parentIdList = Yii::$app->request->post('categories');
        $model->category_ids =  $parentIdList;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FaqArticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->clearCurrentCategoryies();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FaqArticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return FaqArticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FaqArticle::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpdateStatus($id,$url) {
        $model =  FaqArticle::find()->where(['id' => $id])->one();
        $parentIdList = $model-> getCategories()->select('id')->asArray()->all();
        $model->category_ids =  $parentIdList;
        if ($model->status == 0) $model->status = 1;
        else $model->status = 0;
        $model->save();
        return $this->redirect($url);
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
        return $this->render('../../widgets/faqWidget/views/index', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }

    public function actionCategory($id) {
        $array = Yii::$app->db->createCommand('SELECT * FROM faq_article_to_faq_categories WHERE category_id = :id',['id' => $id])->queryAll();
        $result = ArrayHelper::getColumn($array,'article_id');
        $articles = FaqArticle::findAll($result);
        $pagination = new Pagination(['totalCount' => count($articles)]);
        Yii::$app->view->params['customParam'] = 'customValue';
         return $this->render('../../widgets/faqWidget/views/index', [
             'articles' => $articles,
             'pagination' => $pagination,
         ]);

    }
    public function actionDeleted($id,$url) {
        Yii::$app->db->createCommand('DELETE FROM faq_article WHERE id = :id',['id' => $id])->queryAll();
        return $this->redirect($url);
    }
}
