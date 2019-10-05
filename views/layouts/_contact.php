<?php
/* @var $this \yii\web\View */
/* @var $content string */

//use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
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

        <div class="wrap" style="background-image: url('/web/images/clover-back-2.png');">
            <div class="container-fluid nsp-contact-layout">

                <div class="col-xs-10 col-xs-offset-1 text-center">
                    <?= $content ?>
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
