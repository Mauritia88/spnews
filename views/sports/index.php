<?php


use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SportsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Виды спорта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sports-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="form-group row">
        <div class="col-3">
            <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-9">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'sport',
        ],
    ]); ?>

</div>
