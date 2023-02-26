<?php

use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Country $model */

$this->title = $model->country;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="country-view">

    <div class="row">
        <div class="col-md-8">
            <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
            <?= GridView::widget([
                'dataProvider' => $naznDataProvider,
                'summary' => false,
                'emptyText' => '<p>Список пуст</p>',
                'columns' => [
                    [
                        'attribute' => 'Статьи:',
                        'value' => function ($model, $key) {
                            $result = '';
                            $result .= Html::a($model->title, ['site/view', 'id' => $model->article_id], ['class' => 'profile-link text-reset']);
                            return $result;
                        },
                        'format' => 'html',
                    ],
                ],
            ]); ?>
        </div>

        <?= $this->render('/partials/sidebar', [
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'countryes' => $countryes
        ]); ?>
    </div>
</div>
