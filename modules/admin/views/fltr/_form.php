<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fltr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fltr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'is_title')->checkbox(['id' => 'IsParent', 'checked ' => '']) ?>

    <?= $form->field($model, 'category_id')->dropdownList(
         app\models\Category::find()->select(['name', 'id'])->indexBy('id')->column(), ['id' => 'Category','prompt' => 'Выберите категорию...']
    );
    ?>    
    
    <?= $form->field($model, 'fltr_id')->dropdownList(
         app\models\Fltr::find()->where(['is_title' => TRUE])->select(['name', 'id'])->indexBy('id')->column(), ['id' => 'Fltr','prompt' => 'Выберите родительский фильтр...', 'disabled' => true]
    );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(document).ready(function () {
        var obj = $('#IsParent');
        $(obj).click(function () {
            if (obj.prop('checked')) {
                $('#Fltr').attr('disabled', true);
                $('#Category').attr('disabled', false);                
            } else {
                $('#Fltr').attr('disabled', false);
                $('#Category').attr('disabled', true);
            }
        });
    });
</script>