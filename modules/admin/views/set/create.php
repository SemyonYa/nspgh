<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Set */

$this->title = 'Новый набор';
$this->params['breadcrumbs'][] = ['label' => 'Наборы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
