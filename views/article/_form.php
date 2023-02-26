<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput()->label('Дата') ?>

    <?= $form->field($model, 'sport_id')->dropDownList(ArrayHelper::map(\app\models\Sports::find()->all(), 'sport_id', 'sport'),
        ['prompt' => 'Укажите вид спорта'])->label(false); ?>
    <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map(\app\models\Country::find()->all(), 'country_id', 'country'),
        ['prompt' => 'Укажите страну'])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
