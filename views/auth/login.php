<?php

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;


$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login mr0">
    <div class="row">
        <div class="login-box">
            <div class="col-md-12 box box-radius">
                <h1><?= Html::encode($this->title) ?></h1>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-10\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-4 control-label'],
                    ],
                ]); ?>
            
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
            
                    <?= $form->field($model, 'password')->passwordInput() ?>
            
                    <?= $form->field($model, 'rememberMe')->checkbox([
//                        'template' => "<div class=\"col-lg-offset-4 col-lg-8\">{input} {label}</div>\n<div class=\"col-lg-10\">{error}</div>",
                    ]) ?>
            
                    <div class="form-group">
                        <div class="col">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>
            
                <?php ActiveForm::end(); ?>

            </div>
        </div>

<!--        <div class="col-md-2">-->
<!--            <!-- Put this script tag to the <head> of your page -->
<!--            <script type="text/javascript" src="//vk.com/js/api/openapi.js?139"></script>-->
<!---->
<!--            <script type="text/javascript">-->
<!--                VK.init({apiId: 5862316});-->
<!--            </script>-->
<!---->
<!--            <!-- Put this div tag to the place, where Auth block will be -->
<!--            <div id="vk_auth"></div>-->
<!--            <script type="text/javascript">-->
<!--                VK.Widgets.Auth("vk_auth", {width: "200px", authUrl: '/auth/login-vk'});-->
<!--            </script>-->
<!--        </div>-->
    </div>
</div>

