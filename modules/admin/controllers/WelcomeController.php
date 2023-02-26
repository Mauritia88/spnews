<?php


namespace app\modules\admin\controllers;


use app\models\Article;
use app\models\Country;
use app\models\Sports;
use app\models\User;

class WelcomeController extends DefaultController
{
    public function actionIndex()
    {
        $count = [];
        $article = Article::find()->where(['status' => 1])->count();
        $articleall = Article::find()->count();
        $count['article'] = $article;
        $count['articleAll'] = $articleall;
        $country = Country::find()->count();
        $count['country'] = $country;
        $sport = Sports::find()->count();
        $count['sport'] = $sport;
        $user = User::find()->count();
        $count['user'] = $user;
        return $this->render('index', [
            'count' => $count,
        ]);
    }

    public function actionUserv()
    {
        $rows = User::find()->all();
        return $this->render('userv', [
            'rows' => $rows,
        ]);
    }

    public function actionAllow($id)
    {
        $comment = User::findOne($id);
        if ($comment->allow()) {
            return $this->redirect(['userv']);
        }
    }

    public function actionDisallow($id)
    {
        $comment = User::findOne($id);
        if ($comment->disallow()) {
            return $this->redirect(['userv']);
        }
    }

//--------------------------
    public function actionArticl()
    {
        $rows = Article::find()->orderBy('article_id desc')->all();
        return $this->render('articl', [
            'rows' => $rows,
        ]);
    }

    public function actionAllow1($id)
    {
        $comment = Article::findOne($id);
        if ($comment->allow()) {
            return $this->redirect(['articl']);
        }
    }

    public function actionDisallow1($id)
    {
        $comment = Article::findOne($id);
        if ($comment->disallow()) {
            return $this->redirect(['articl']);
        }
    }

    public function actionDelete($id)
    {
        $comment = Article::findOne($id);
        if ($comment->delete()) {
            return $this->redirect(['articl']);
        }
    }
}