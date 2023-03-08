<?php

/** @var yii\web\View $this */

use yii\bootstrap4\LinkPager;
use yii\helpers\Url;

$this->title = Yii::$app->name;
?>
<div class="main-content">

    <div class="container">
        <div class="form-group row justify-content-start">
            <form class="col-8" method="get" action="<?= Url::to(['/site/search']) ?>">
                <input type="text" size="100%" class="form-control" name="search" placeholder="search"/>
            </form>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div>
                    <?php if ($search != null): ?>
                        <h4 class="text-center">Данные по запросу <?= $search ?></h4>
                    <?php endif ?>
                </div>
                <?php foreach ($articles as $article): ?>
                    <article class="post1">
<!--                        <div class="post-thumb">-->
<!--                            <a href="--><?//= Url::toRoute(['site/view', 'id'=>$article->article_id]);?><!--"><img src="--><?//= $article->getImage();?><!--" alt=""></a>-->
<!--                            <a href="--><?//= Url::toRoute(['site/view', 'id'=>$article->article_id]);?><!--" class="post-thumb-overlay text-center">-->
<!--                                <div class="text-uppercase text-center">View Post</div>-->
<!--                            </a>-->
<!--                        </div>-->
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6 class="decoration"><a
                                            href="<?= Url::toRoute(['site/category', 'id' => $article->sport->sport_id]) ?>"> <?= $article->sport->sport; ?></a>
                                </h6>

                                <h1><a class="text-reset"
                                       href="<?= Url::toRoute(['site/view', 'id' => $article->article_id]); ?>"><?= $article->title ?></a>
                                </h1>

                            </header>
                            <div class="entry-content">
                                <p><?= $article->description ?></p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->article_id]); ?>"
                                       class="more-link">Продолжить чтение</a>
                                </div>
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">By <?= $article->author->name; ?> On <?= $article->getDate(); ?></span>
                                <ul class="text-center pull-right">
                                    <i class="fa fa-eye"></i> <?= (int)$article->viewed ?>
                                </ul>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories,
                'countryes' => $countryes
            ]); ?>
        </div>
    </div>
</div>

