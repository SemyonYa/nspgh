<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Fltr */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Фильтры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fltr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = \yii\widgets\ActiveForm::begin() ?>
    <?= Html::input('hidden', 'FltrProducts[filter_id]', $model->filter_id) ?>
    <?php //echo $form->field($model, 'filter_id')->hiddenInput() ?>
    <?php //echo $form->field($model, 'checked_list[]')->checkboxList(
          //  ArrayHelper::map($products, 'id', 'name'), ['separator' => '<br>']
    //);
    ?>
    <?php foreach ($products as $product): ?>
        <?= Html::checkbox('FltrProducts[checked_list][]', in_array($product->id, $checked_filter_products), ['label' => $product->name, 'value' => $product->id]) ?><br/>
    <?php endforeach; ?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-default']) ?>
<?php $form = \yii\widgets\ActiveForm::end(); ?>



</div>
