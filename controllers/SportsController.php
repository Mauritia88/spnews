<?php

namespace app\controllers;

use app\models\Sports;
use app\models\SportsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SportsController implements the CRUD actions for Sports model.
 */
class SportsController extends Controller
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
     * Lists all Sports models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SportsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sports model.
     * @param int $sport_id Sport ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sport_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sport_id),
        ]);
    }

    /**
     * Creates a new Sports model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sports();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sports model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $sport_id Sport ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sport_id)
    {
        $model = $this->findModel($sport_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sports model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $sport_id Sport ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sport_id)
    {
        $this->findModel($sport_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sports model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $sport_id Sport ID
     * @return Sports the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sport_id)
    {
        if (($model = Sports::findOne(['sport_id' => $sport_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
