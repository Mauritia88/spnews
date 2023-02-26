<?php
use yii\helpers\Url;
?>

<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post1">
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category','id'=>$article->sport->sport_id])?>"> <?= $article->sport->sport?></a></h6>
                            <h1 class="entry-title"><?= $article->title?></a></h1>
                        </header>

                        <div class="entry-content decoration">
                            <?= $article->content?>
                        </div>

                        <div class="social-share">
							<span class="social-share-title pull-left text-capitalize">By <?= $article->author->name?> On <?= $article->getDate();?></span>
                            <ul class="text-center pull-right">
                                <a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                                <a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                <a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a>
                            </ul>
                        </div>
                    </div>
                </article>

             <?= $this->render('/partials/comment', [
                 'article'=>$article,
                 'comments'=>$comments,
                 'commentForm'=>$commentForm
             ])?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories,
                'countryes' => $countryes
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->