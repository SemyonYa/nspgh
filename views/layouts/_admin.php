<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
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
        <title>Админка: <?= Html::encode($this->title) ?></title>
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
    <body id="Home">
        <div id="Homer" hidden>
            <a href="#Home"><span class="glyphicon glyphicon-chevron-up"></span></a>
        </div>
        <?php $this->beginBody() ?>

        <div class="wrap admin">
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
                        <?php $main_menu = app\models\Menu::find()->where(['parent_id' => app\models\Menu::findOne(['uniqcode' => 'main'])->id])->all(); ?>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="/"><span class="glyphicon glyphicon-arrow-left"></span> На сайт</a></li>
                                <li><a href="/admin/product">Список продуктов</a></li>
                                <li><a href="/admin/set">Наборы</a></li>                                
                                <li><a href="/admin/fltr">Фильтры</a></li>
                                <li><a href="/admin/page">Страницы</a></li>
                                <li><a href="/admin/post">Блог</a></li>
                                <li><a href="/admin/news">Новости</a></li>
                                <li><a href="/admin/scheme">Схемы назначения</a></li>
                                <li><a href="/admin/video">Видео</a></li>
                                <li><a href="/rbac/default/index">Пользователи</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right nsp-social">
                                <?=
                                Yii::$app->user->isGuest ? (
                                        ['label' => 'Login', 'url' => ['/site/login']]
                                        ) : (
                                        '<li>'
                                        . Html::beginForm(['/site/logout'], 'post')
                                        . Html::submitButton(
                                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-default logout']
                                        )
                                        . Html::endForm()
                                        . '</li>'
                                        )
                                ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->  
                    </div><!-- /.container-fluid -->  
                </nav>

                <div class="col-xs-10 col-xs-offset-1 nsp-search">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                    <?= Alert::widget() ?>
<?= $content ?>
                </div>
            </div>

            <footer class="">
                &copy; NSP-WELLNESS <?= date('Y') ?>
            </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
