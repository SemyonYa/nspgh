<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'art')->textInput(['maxlength' => true]) ?>  

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief_description')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'full_description')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'how_use')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'composition')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'contraindications')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'storage')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'category_id')->dropdownList(
            app\models\Category::find()->select(['name', 'id'])->indexBy('id')->column(), ['id' => 'Category', 'prompt' => 'Выберите категорию...']
    );
    ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'number', 'step' => 0.01]) ?>

    <?= $form->field($model, 'price_without_discount')->textInput(['type' => 'number', 'step' => 0.01]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true, 'type' => 'number']) ?>

    <?= $form->field($model, 'img_id')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]);
    ?>

    <?= $form->field($model, 'galery_1')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]);
    ?>

    <?= $form->field($model, 'galery_2')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]);
    ?>

    <?= $form->field($model, 'galery_3')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]);
    ?>
    
    <?= $form->field($model, 'video')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'is_promo')->checkbox() ?>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
