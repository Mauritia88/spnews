<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sports $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sports-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sport')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
