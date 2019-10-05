<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fltr */

$this->title = 'Редактирование фильтра: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Фильтры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fltr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
