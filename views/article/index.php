<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание новости', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
            'content:ntext',
            'date',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html::img($data->getImage(), ['width' => 200]);
                }
            ],
            [
                'attribute' => 'Спорт и страна',
                'value' => function ($data) {
                    $a = \app\models\Sports::findOne(['sport_id' => $data->sport_id])->sport;
                    $b = \app\models\Country::findOne(['country_id' => $data->country_id])->country;
                    return $a . ' ' . $b;
                }
            ],
            [
                'attribute' => 'Автор',
                'value' => function ($data) {
                    return \app\models\User::findOne(['user_id' => $data->user_id])->name;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'article_id' => $model->article_id]);
                }
            ],
        ],
    ]); ?>


</div>
