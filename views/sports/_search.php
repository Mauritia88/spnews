<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SportsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sports-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="row col-8 ml-auto">
        <div class="col-8">
            <?= $form->field($model, 'sport')->textInput(['placeholder' => "Название"])->label(false) ?>
        </div>
        <div class="">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Очистить', ['onclick' => 'window.location.replace(window.location.pathname);',
                'class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
