<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?=
    $form->field($model, 'text')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
            'height' => 200,
            'filebrowserImageBrowseUrl' => yii\helpers\Url::to(['/imagemanager/manager', 'view-mode' => 'iframe', 'select-type' => 'ckeditor']),
        ]
    ])
    ?>

    <?=
    $form->field($model, 'img_id')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
        'aspectRatio' => (16 / 9), //set the aspect ratio
        'showPreview' => true, //false to hide the preview
        'showDeletePickedImageConfirm' => false, //on true show warning before detach image
    ]);
    ?>

    <?=
    $form->field($model, 'category_id')->dropdownList(
            app\models\PostCategory::find()->select(['name', 'id'])->indexBy('id')->column(), ['id' => 'PostCategory', 'prompt' => 'Выберите категорию...']
    );
    ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

<?= $form->field($model, 'deactivated')->checkbox() ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
