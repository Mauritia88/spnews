<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget1">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
            <?php
            foreach($popular as $article):?>
                <div class="popular-post">
                    <a href="<?= Url::toRoute(['site/view','id'=>$article->article_id]);?>" class="popular-img"><img src="<?= $article->getImage();?>" alt="">
                    </a>

                    <div class="p-content">
                        <a href="<?= Url::toRoute(['site/view','id'=>$article->article_id]);?>" class="text-uppercase"><?= $article->title?></a>
                        <span class="p-date"><?= $article->getDate();?></span>

                    </div>
                </div>
            <?php endforeach;?>

        </aside>
        <aside class="widget1 pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
            <?php foreach($recent as $article):?>
                <div class="thumb-latest-posts">
                    <div class="media">
<!--                        <div class="media-left">-->
<!--                            <a href="--><?//= Url::toRoute(['site/view','id'=>$article->article_id]);?><!--" class="popular-img"><img src="--><?//= $article->getImage();?><!--" alt="">-->
<!--                            </a>-->
<!--                        </div>-->
                        <div class="p-content">
                            <a href="<?= Url::toRoute(['site/view','id'=>$article->article_id]);?>" class="text-uppercase"><?= $article->title?></a>
                            <span class="p-date"><?= $article->getDate();?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </aside>

        <aside class="widget1 border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Виды спорта</h3>
            <ul>
                <?php foreach($categories as $category):?>
                    <li>
                        <a href="<?= Url::toRoute(['site/category','id'=>$category->sport_id]);?>"><?= $category->sport?></a>
                       <span class="post-count pull-right"> (<?= $category->getArticlesCount();?>)</span>
                    </li>
                <?php endforeach;?>

            </ul>

        </aside>

        <aside class="widget1 border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Страны</h3>
            <ul>
                <?php foreach($countryes as $country):?>
                    <li>
                        <a href="<?= Url::toRoute(['/country/view','country_id'=>$country->country_id]);?>"><?= $country->country?></a>
                        <span class="post-count pull-right"> (<?= $country->getArticlesCountryCount();?>)</span>
                    </li>
                <?php endforeach;?>

            </ul>

        </aside>

    </div>
</div>