<?php

use yii\helpers\Html;

?>
<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><?= $title ?></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?= $title ?></b> Администратор</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Навигация</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= Html::img(Yii::$app->user->identity->photo, ['class' => 'user-image']) ?>
                        <span class="hidden-xs">Admin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?= Html::img(Yii::$app->user->identity->photo, ['class' => 'img-circle', 'alt' => 'User Image']) ?>
                            <p>
                                <?= Yii::$app->user->identity->name ?>
                            </p>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
