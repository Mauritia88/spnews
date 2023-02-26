<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img(Yii::$app->user->identity->photo, ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <?= Yii::$app->user->identity->name ?>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label' => 'Главная', 'icon' => 'fa fa-home',
                        'url' => ['welcome/index'], 'active' => $this->context->route == 'welcome/index'
                    ],
                    [
                        'label' => 'Статьи',
                        'icon' => 'fa fa-bars',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Просмотр',
                                'icon' => 'fa fa-list',
                                'url' => ['/article/index'],
                                'active' => $this->context->route == '/article/index'
                            ],
                            [
                                'label' => 'Разрешение добавления',
                                'icon' => 'fa fa-folder',
                                'url' => ['welcome/articl'],
                                'active' => $this->context->route == 'welcome/articl'
                            ]
                        ]
                    ],
                    [
                        'label' => 'Комментарии',
                        'icon' => 'fa fa-comments',
                        'url' => ['comment/index'],
                        'active' => $this->context->route == 'admin/comment/index',
                    ],
                    [
                        'label' => 'Спорт',
                        'icon' => 'fa fa-life-ring',
                        'url' => ['/sports/index'],
                        'active' => $this->context->route == '/sports/index',
                    ],
                    [
                        'label' => 'Страна',
                        'icon' => 'fa fa-map-signs',
                        'url' => ['/country/index'],
                        'active' => $this->context->route == '/country/index',
                    ],
                    [
                        'label' => 'Пользователи',
                        'icon' => 'fa fa-user',
                        'url' => ['welcome/userv'],
                        'active' => $this->context->route == 'welcome/userv',
                    ],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                ],
            ]
        )
        ?>

    </section>
    <!-- /.sidebar -->
</aside>
