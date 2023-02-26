<?php


use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Пользователи';
?>

<div class="user-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <table class="table table-hover">
        <tr>
            <th>Имя</th>
            <th>email</th>
            <th>Админ?</th>
            <th>Сделать админом</th>
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td> <?= $row->name ?></td>
                <td><?= $row->email ?> </td>
                <?php if ($row->isAdmin): ?>
                    <td> Администратор</td>
                    <td><a class="btn btn-warning"
                           href="<?= Url::toRoute(['welcome/disallow', 'id' => $row->user_id]); ?>">Disallow</a></td>
                <?php else: ?>
                    <td> Пользователь</td>
                    <td><a class="btn btn-success"
                           href="<?= Url::toRoute(['welcome/allow', 'id' => $row->user_id]); ?>">Allow</a></td>
                <?php endif ?>
            </tr>
        <?php endforeach; ?>

    </table>


</div>

