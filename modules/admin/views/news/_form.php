<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'body')->textarea(['rows' => 6]);
    // widget(CKEditor::className(), [
    //     'options' => ['rows' => 6],
    //     'editorOptions' => [
    //         'preset' => 'full',
    //         'inline' => false,
    //         'height' => 200,
    //         'filebrowserImageBrowseUrl' => yii\helpers\Url::to(['/imagemanager/manager', 'view-mode' => 'iframe', 'select-type' => 'ckeditor']),
    //     ]
    // ])
    ?>
    <?=
    $form->field($model, 'img_id')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]);
    ?>
    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
