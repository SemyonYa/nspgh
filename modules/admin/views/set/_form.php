<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Set */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'art')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief_description')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'full_description')->widget(CKEditor::className()) ?>
    
    <?= $form->field($model, 'how_use')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'number', 'step' => 0.01]) ?>

    <?= $form->field($model, 'price_without_discount')->textInput(['type' => 'number', 'step' => 0.01]) ?>

    <?= $form->field($model, 'img_id')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]); ?>

    <?= $form->field($model, 'is_promo')->checkbox() ?>

    <?= $form->field($model, 'galery_1')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]); ?>

    <?= $form->field($model, 'galery_2')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]); ?>

    <?= $form->field($model, 'galery_3')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]); ?>
    
    <?= $form->field($model, 'video')->widget(CKEditor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
