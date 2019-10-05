<?php 
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>


<?php $form2 = ActiveForm::begin(['id' => 'Order']); ?>
<?= $form2->field($order_cart, 'fio')->textInput(['maxlength' => true, 'placeholder' => 'Ф.И.О.']) ?>  
<?= $form2->field($order_cart, 'email')->textInput(['maxlength' => true]) ?>  
<?= $form2->field($order_cart, 'phone')->textInput(['maxlength' => true]) ?>  
<?= $form2->field($order_cart, 'address')->textarea(['rows' => 3]) ?>  
<?= $form2->field($order_cart, 'member')->textInput() ?>  
<?= $form2->field($order_cart, 'consent')->checkbox() ?>  
<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
<?= Html::submitButton('Купить', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>