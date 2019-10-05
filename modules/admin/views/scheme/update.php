<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scheme */

$this->title = 'Изменение схемы: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Схемы назначений', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'sc_model')) ?>

</div>
