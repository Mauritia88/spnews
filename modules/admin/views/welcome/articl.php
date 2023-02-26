<?php


use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Статьи';
?>

    <div class="user-index">

        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

        <table class="table table-hover">
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Статья</th>
                <th>Дата</th>
                <th>Количество просмотров</th>
                <th>Автор</th>
                <th>Вид спорта</th>
                <th>Страна</th>
                <th>Разрешение</th>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td> <?= $row->title ?></td>
                    <td><?= $row->description ?> </td>
                    <td><?= $row->content ?> </td>
                    <td><?= $row->getDate() ?> </td>
                    <td><?= $row->viewed ?></td>
                    <td><?= $row->author->name ?> </td>
                    <td><?= $row->sport->sport ?> </td>
                    <td><?= $row->country->country ?> </td>
                    <td>
                        <?php if($row->isAllowed()):?>
                            <a class="btn btn-warning" href="<?= Url::toRoute(['welcome/disallow1', 'id'=>$row->article_id]);?>">Disallow</a>
                        <?php else:?>
                            <a class="btn btn-success" href="<?= Url::toRoute(['welcome/allow1', 'id'=>$row->article_id]);?>">Allow</a>
                        <?php endif?>
                        <a class="btn btn-danger" href="<?= Url::toRoute(['welcome/delete', 'id' => $row->article_id]); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>


    </div>

<?php
