<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Set */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Наборы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать ' . $model->name, ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>
    <?php if ($model->products): ?>
        <ul>
            <?php foreach ($model->setProducts as $sp): ?>
            <li><?= $sp->product->name ?>   <span title="Удалить продукт из набора" class="glyphicon glyphicon-remove text-danger" style="cursor: pointer" onclick="RemoveSetProduct(<?=$sp->id?>)"></span></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <!-- Триггер кнопка модали-->  
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Добавить продукт в набор...
    </button>

    <!-- Модаль -->  
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">+ продукт</h4>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <input type="hidden" value="<?= $sp_model->set_id ?>" />
                    <?=
                    $form->field($sp_model, 'product_id')->dropdownList(
                            app\models\Product::find()->select(['name', 'id'])->indexBy('id')->orderBy('name')->column(), ['id' => 'Product', 'prompt' => 'Выберите продукт...']
                    );
                    ?>
                    <?= $form->field($sp_model, 'quantity')->textInput(['type' => 'number']) ?>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>


    <?php
//    echo
//    DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'art',
//            'name',
//            'price',
//            'price_without_discount',
//        ],
//    ])
    ?>

</div>
