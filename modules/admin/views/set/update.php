<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Set */

$this->title = 'Изменение продукта: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Наборы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
