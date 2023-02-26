<?php
use yii\helpers\Html;
$this -> title = 'Добро пожаловать!';
?>
<h1 class="text-center">Статистика по сайту</h1>
<table class="table table-hover">
    <tr>
        <td>Записей на главной</td>
        <td><?=Html::a($count['article'], ['/site/index']) ?></td>
    </tr>
    <tr>
        <td>Всего записей</td>
        <td><?=Html::a($count['articleAll'], ['/article/index']) ?></td>
    </tr>
    <tr>
        <td>Стран</td>
        <td><?=Html::a($count['country'], ['/country/index']) ?></td>
    </tr>
    <tr>
        <td>Видов спорта</td>
        <td><?=Html::a($count['sport'], ['/sports/index']) ?></td>
    </tr>
    <tr>
        <td>Пользователей</td>
        <td><?=Html::a($count['user'], ['welcome/userv']) ?></td>
    </tr>
</table>
