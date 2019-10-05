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
    <body>
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

                <?= $content ?>

            </div>
            <footer class="">
                &copy; NSP-WELLNESS <?= date('Y') ?>
            </footer>

            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
