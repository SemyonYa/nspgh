<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
        <script src="/web/assets/a7fd0c7e/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <img class="clover-coner" src="/web/images/clover-coner.png" />

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
                                <?php foreach ($main_menu as $m): ?>
                                    <?php if (app\models\Menu::find()->where(['parent_id' => $m->id])->all() != NULL): ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <?= $m->name ?><span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php foreach (app\models\Menu::find()->where(['parent_id' => $m->id])->all() as $mm): ?>
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
                                <a href="mailto:info@nsp-wellness.ru"><span class="glyphicon glyphicon-envelope"></span></a>
                            </div>
                        </div>
                        <div class="nsp-consultant-cart">
                            <?php $goods_count = (count(Yii::$app->session->get('products')) + count(Yii::$app->session->get('sets'))) ?>
                            <a href="/product/cart" title="Товаров в корзине: <?= $goods_count ?>">Корзина <b>(<span id="CartCount"><?= $goods_count ?></span>)</b></a>
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 nsp-search">
                    <?php $form = ActiveForm::begin(['action' => '/product/search', 'method' => 'post', 'options' => ['class' => 'nsp-search-form']]); ?>
                    <!--<form class="nsp-search-form" method="post" action="/product/search">-->
                    <div class="nsp-search-form-input">
                        <input type="text" name="data" class="form-control" placeholder="Введите наименование..." oninput="SearchList(event)">
                    </div>
                    <button type="submit" class="btn btn-default">Найти</button>
                    <!--</form>-->
                    <?php ActiveForm::end(); ?>
                </div>
                <div id="search-list" class="nsp-search-result-active-list" hidden>                    
                    <!--axaj query result-->
                </div>
                <!--<div>-->
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
                <!--                </div>-->
            </div>
        </div>
        <footer class="">
            &copy; NSP-WELLNESS <?= date('Y') ?>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
