<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Country $model */

$this->title = 'Обновить запись: ' . $model->country_id;
$this->params['breadcrumbs'][] = ['label' => 'Страны', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
