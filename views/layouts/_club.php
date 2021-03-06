<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link rel="shortcut icon" href="/web/images/clover25.png" type="image/png">
        <link rel="icon" href="/web/images/clover25.png" type="image/png">
        <!--<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">--> 
        <!-- <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet"> -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Anonymous+Pro" rel="stylesheet"> -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Kurale" rel="stylesheet"> -->
        <script src="/web/assets/36f202e8/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/web/js/script.js"></script>
    </head>
    <body id="Home">
        <div id="Homer" hidden>
            <a href="#Home"><span class="glyphicon glyphicon-chevron-up"></span></a>
        </div>
        <img class="clover-coner" src="/web/images/clover-coner.png" />
        <?php $this->beginBody() ?>

        <div class="wrap">

            <div class="container-fluid">
                <nav class="navbar navbar-default nsp-header">
                    <div class="container-fluid">
                        <!-- Brand и toggle сгруппированы для лучшего отображения на мобильных дисплеях -->  
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>

                        <!-- Соберите навигационные ссылки, формы, и другой контент для переключения -->  
                        <?php $main_menu = app\models\Menu::find()->where(['parent_id' => app\models\Menu::findOne(['uniqcode' => 'main'])->id])->orderBy('ordering')->all(); ?>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="/"><span class="glyphicon glyphicon-home nsp-homebutton"></span></a></li>
                                <?php foreach ($main_menu as $m) : ?>
                                    <?php if (app\models\Menu::find()->where(['parent_id' => $m->id])->all() != null) : ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <?= $m->name ?><span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php foreach (app\models\Menu::find()->where(['parent_id' => $m->id])->all() as $mm) : ?>
                                                    <li><a href="<?= $mm->url ?>"><?= $mm->name ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php else : ?>
                                        <li><a href="<?= $m->url ?>"><?= $m->name ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="nav navbar-nav navbar-right nsp-social">
                                <li><a href="https://vk.com"><img src="/web/images/vk.png" /></a></li>
                                <li><a href="https://fb.com"><img src="/web/images/fb.png" /></a></li>
                                <li><a href="https://instagram.com"><img src="/web/images/insta.png" /></a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->  
                    </div><!-- /.container-fluid -->  
                </nav>
                <div class="col-xs-10 col-xs-offset-1 nsp-lc">
                    <div class="nsp-logo">
                        <a href="/">
                            <img src="/web/images/logo-full-600.png" />
                        </a>
                    </div>
                    <div class="nsp-consultant">
                        <div class="nsp-consultant-icons">
                            <div class="nsp-consultant-icon">
                                <a href="tel:88005116998" title="8-800-511-69-98"><span class="glyphicon glyphicon-phone-alt"></span></a>
                            </div>
                            <div class="nsp-consultant-icon">
                                <a href="mailto:info@nsp-wellness.ru" title="info@nsp-wellness.ru"><span class="glyphicon glyphicon-envelope"></span></a>
                            </div>
                        </div>
                        <div class="nsp-consultant-cart">
                            <?php $goods_count = (count(Yii::$app->session->get('products')) + count(Yii::$app->session->get('sets'))) ?>
                            <a href="/product/cart" title="Товаров в корзине: <?= $goods_count ?>">Корзина <b>(<span id="CartCount"><?= $goods_count ?></span>)</b></a>
                        </div>
                    </div>
                </div> 
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h1><?= $this->title ?></h1>
                    <div class="col-xs-12 nsp-delivery-slider">
                        <video src="/web/video/NS.mp4" autoplay></video>
                        <!-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="/web/images/slide-01.jpg" alt="Акция: доставка по Нижнему Новгороду - БЕСПЛАТНО">
                                    <div class="carousel-caption">
                                        При заказе от 2 000 руб. доставка по Нижнему Новгороду бесплатно
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="/web/images/slide-02.jpg" alt="Доставка по городу - 200 руб.">
                                    <div class="carousel-caption">
                                        При любом заказе доставка до двери по Нижнему Новгороду - 200 руб.
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="/web/images/slide-03.jpg" alt="Какая-то еще акция...">
                                    <div class="carousel-caption">
                                        При покупке любого набора NSP - брошюра в подарок!
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">назад</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">вперед</span>
                            </a>
                        </div> -->
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="">
            &copy; NSP-WELLNESS <?= date('Y') ?>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
