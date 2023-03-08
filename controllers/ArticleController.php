<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\ImageUpload;
use app\models\Sports;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Article models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param int $article_id Article ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($article_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($article_id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Article();
        $upload = new ImageUpload;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->saveArticle()) {
                if ($file = uploadedFile::getInstance($model, 'image')) {
                    $model->saveImage($upload->uploadFile($file, $model->image));
                }
                return $this->redirect(['/site/index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $article_id Article ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($article_id)
    {
        $model = $this->findModel($article_id);
        $upload = new ImageUpload;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->saveArticle()) {
            if ($file = uploadedFile::getInstance($model, 'image')) {
                $model->saveImage($upload->uploadFile($file, $model->image));
            }
            return $this->redirect(['/site/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $article_id Article ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($article_id)
    {
        $this->findModel($article_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $article_id Article ID
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($article_id)
    {
        if (($model = Article::findOne(['article_id' => $article_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetImage($id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost)
        {
            $article = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');

            if($article->saveImage($model->uploadFile($file, $article->image)))
            {
                return $this->redirect(['view', 'id'=>$article->article_id]);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionSetCategory($id)
    {
        $article = $this->findModel($id);
        $selectedCategory = $article->sport->sport_id;
        $categories = ArrayHelper::map(Sports::find()->all(), 'sport_id', 'sport');

        if(Yii::$app->request->isPost)
        {
            $category = Yii::$app->request->post('sport');
            if($article->saveCategory($category))
            {
                return $this->redirect(['view', 'id'=>$article->article_id]);
            }
        }

        return $this->render('category', [
            'article'=>$article,
            'selectedCategory'=>$selectedCategory,
            'categories'=>$categories
        ]);
    }
}
