<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Scheme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scheme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className()) ?>

    <?php //echo $form->field($model, 'img_id')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
    //     'aspectRatio' => (16 / 9), //set the aspect ratio
    //     'showPreview' => true, //false to hide the preview
    //     'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    // ]);
    ?>

    <?= $form->field($model, 'deactivated')->checkbox() ?>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right">
        Добавить новую категорию...
    </button>
    <?=
    $form->field($model, 'scheme_category_id')->dropdownList(
            app\models\SchemeCategory::find()->select(['name', 'id'])->indexBy('id')->column(), ['id' => 'SchemeCategory', 'prompt' => 'Выберите категорию...']
    );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Триггер кнопка модали-->  
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Добавить новую категорию...
</button> -->

<!-- Модаль -->  
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">+ категория схем назначения</h4>
            </div>
            <div class="modal-body">
                <?php $form2 = ActiveForm::begin(); ?>
                <?= $form2->field($sc_model, 'name')->textInput(); ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                <button type="submit" class="btn btn-primary">Добавить</button>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>