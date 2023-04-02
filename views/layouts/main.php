<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\PublicAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;


PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-expand-lg navbar-light bg-light main-menu',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],

            !Yii::$app->user->isGuest ? (
                ['label' => 'Добавить статью', 'url' => ['/article/create']]
            ) : '',

            !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin  ?(
                    ['label' => 'Админка', 'url' => ['/admin/welcome/index']]
            ) : '',

            Yii::$app->user->isGuest ? (
            ['label' => 'Вход на сайт',
                'items' => [
                    '<div class="dropdown-divider"></div>',
                    ['label' => 'Вход', 'url' => ['/auth/login']],
                    '<div class="dropdown-divider"></div>',
                    ['label' => 'Зарегистрироваться', 'url' => ['/auth/signup']],
                ],

            ]
            ) : (
                '<li>'
                . Html::beginForm(['/auth/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->name . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy;<?= Yii::$app->name ?> 2022 - <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
