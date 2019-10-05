<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
            'height' => 200,
            'filebrowserImageBrowseUrl' => yii\helpers\Url::to(['/imagemanager/manager', 'view-mode' => 'iframe', 'select-type' => 'ckeditor']),
        ]
    ])
    ?>
    <?= $form->field($model, 'uniqcode')->textInput() ?>

    <?= $form->field($model, 'hidden')->checkbox() ?>
    <?= $form->field($model, 'is_club')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
