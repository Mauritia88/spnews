<?php

namespace app\controllers;

use app\models\Article;
use app\models\CommentForm;
use app\models\Country;
use app\models\Sports;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    // показать главную страницу (не больше 3х статей на страницу)
    public function actionIndex()
    {
        $data = Article::getAll(3);
        $recent = Article::getRecent();
        $popular = Article::getPopular();
        $categories = Sports::getAll();
        $country = Country::getAll();

        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'countryes' => $country
        ]);
    }


//показать статьи по спорту
    public function actionCategory($id)
    {
        $data = Sports::getArticlesBySports($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Sports::getAll();
        $country = Country::getAll();

        return $this->render('category', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'countryes' => $country
        ]);
    }

//показать одну выбранную статью, увеличить счетчик просмотра
    public function actionView($id)
    {
        $article = Article::findOne($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Sports::getAll();
        $country = Country::getAll();

        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();

        $article->viewedCounter();

        return $this->render('single', [
            'article' => $article,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'countryes' => $country,
            'comments' => $comments,
            'commentForm' => $commentForm
        ]);
    }

//добавить комментарий
    public function actionComment($id)
    {
        $model = new CommentForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->saveComment($id)) {
                Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                return $this->redirect(['site/view', 'id' => $id]);
            }
        }
    }

    // поиск
    public function actionSearch()
    {
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Sports::getAll();
        $autor = Article::getAll();
        $country = Country::getAll();

        $search = Yii::$app->request->get('search');
        $search = trim($search);
        $pages = Article::getAll(5);

        if ($query = Sports::find()->where(['like', 'sport', $search])->all()) {
            return $this->render('index', [
                'articles' => $query[0]->articles,
                'search' => $search,
                'pagination' => $pages['pagination'],
                'popular' => $popular,
                'recent' => $recent,
                'countryes' => $country,
                'categories' => $categories]);
        } elseif ($tmp = Article::find()->where(['like', 'title', $search])->all()) {
            $query = $tmp;
            return $this->render('index', [
                'articles' => $query,
                'search' => $search,
                'pagination' => $pages['pagination'],
                'popular' => $popular,
                'recent' => $recent,
                'countryes' => $country,
                'categories' => $categories]);
        } elseif ($tmp = Country::find()->where(['like', 'country', $search])->all()) {
            $query = $tmp;
            return $this->render('index', [
                'articles' => $query[0]->articlesC,
                'search' => $search,
                'pagination' => $pages['pagination'],
                'popular' => $popular,
                'recent' => $recent,
                'countryes' => $country,
                'categories' => $categories,
                'autor' => $autor]);
        }
    }
}
