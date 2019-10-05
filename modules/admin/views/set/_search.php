<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'art') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'brief_description') ?>

    <?= $form->field($model, 'full_description') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'price_without_discount') ?>

    <?php // echo $form->field($model, 'img_id') ?>

    <?php // echo $form->field($model, 'is_promo') ?>

    <?php // echo $form->field($model, 'galery_1') ?>

    <?php // echo $form->field($model, 'galery_2') ?>

    <?php // echo $form->field($model, 'galery_3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
