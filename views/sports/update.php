<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sports $model */

$this->title = 'Update Sports: ' . $model->sport_id;
$this->params['breadcrumbs'][] = ['label' => 'Sports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sport_id, 'url' => ['view', 'sport_id' => $model->sport_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sports-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
