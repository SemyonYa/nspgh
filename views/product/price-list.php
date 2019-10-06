<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Прайс-лист';
?>
<div class="col-xs-12 col-md-10 col-md-offset-1">
    <h1><?= $this->title ?></h1>
    <div class="col-xs-12 col-md-6 col-md-offset-6">
        <input type="text" name="data" class="form-control" placeholder="Фильтровать список..." autocomplete="off" oninput="FilteringPriceList(event)" />
    </div>
    <h3 class="nsp-price-h3">Наборы</h3>
    <table class="col-xs-12 nsp-price-table">
        <?php foreach ($sets as $s): ?>
            <tr class="nsp-price-list-item">
                <td><?= $s->art ?></td>
                <td><img src="<?= \Yii::$app->imagemanager->getImagePath($s->img_id, '70', '70', 'inset') ?>" class=""/></td>
                <td><?= $s->name ?></td>
                <td>
                    <?= round(($s->price * $currency), 2) ?>&#8381;
                    <?= ($s->price_without_discount) ? '<span style="text-decoration:line-through">' . round(($s->price_without_discount * $currency), 2) . '&#8381;</span>' : '' ?>
                </td>
                <td></td>
                <td>
                    <button class="nsp-btn-buying-list" data-toggle="modal" data-target="#myModalSet" onclick="FillSetData(<?= $s->id ?>)"><span class="glyphicon glyphicon-transfer"></span></button>
                    <?php if (isset($sets_r[$s->id])): ?>
                        <button id="ToCartS<?= $s->id ?>" class="nsp-btn-buying-list" disabled><span class="glyphicon glyphicon-ok"></span></button>
                    <?php else: ?>
                        <button id="ToCartS<?= $s->id ?>" class="nsp-btn-buying-list" onclick="ToCartPriceSet(<?= $s->id ?>)"><span class="glyphicon glyphicon-shopping-cart"></span></button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php foreach ($categories as $c): ?>
        <h3 class="nsp-price-h3"><?= $c->name ?></h3>
        <table class="col-xs-12 nsp-price-table">
            <?php foreach ($products as $p): ?>
                <?php if ($p->category_id === $c->id): ?>
                    <tr class="nsp-price-list-item">
                        <td><?= $p->art ?></td>
                        <td><img src="<?= \Yii::$app->imagemanager->getImagePath($p->img_id, '70', '70', 'inset') ?>" class=""/></td>
                        <td><?= $p->name ?> (<?= $p->name_eng ?>)</td>
                        <td>
                            <?= round(($p->price * $currency), 2) ?>&#8381;
                            <?= ($p->price_without_discount) ? '<span style="text-decoration:line-through">' . round(($p->price_without_discount * $currency), 2) . '&#8381;</span>' : '' ?>
                        </td>
                        <td><?= $p->quantity ?></td>
                        <td>
                            <button class="nsp-btn-buying-list" data-toggle="modal" data-target="#myModal" onclick="FillProductData(<?= $p->id ?>)"><span class="glyphicon glyphicon-transfer"></span></button>
                            <?php if (isset($products_r[$p->id])): ?>
                                <button id="ToCart<?= $p->id ?>" class="nsp-btn-buying-list" disabled><span class="glyphicon glyphicon-ok"></span></button>
                            <?php else: ?>
                                <button id="ToCart<?= $p->id ?>" class="nsp-btn-buying-list" onclick="ToCartPrice(<?= $p->id ?>)"><span class="glyphicon glyphicon-shopping-cart"></span></button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>

</div>

<!-- Модаль -->  
<!--I-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Покупка товара</h4>
            </div>
            <div class="modal-body">
                <?php $form1 = ActiveForm::begin(['id' => 'OrderProduct']); ?>
                <?= $form1->field($order_price_modal, 'fio')->textInput(['maxlength' => true, 'placeholder' => 'Ф.И.О.']) ?>  
                <?= $form1->field($order_price_modal, 'email')->textInput(['maxlength' => true]) ?>  
                <?= $form1->field($order_price_modal, 'phone')->textInput(['maxlength' => true]) ?>  
                <?= $form1->field($order_price_modal, 'good')->textInput(['id' => 'Good', 'maxlength' => true, 'value' => '$product->name', 'disabled' => TRUE]) ?>  
                <?= $form1->field($order_price_modal, 'quantity')->textInput(['type' => 'number', 'value' => 1]) ?>  
                <?= $form1->field($order_price_modal, 'address')->textarea(['rows' => 3]) ?>  
                <?= $form1->field($order_price_modal, 'good_id')->hiddenInput(['id' => 'GoodId', 'value' => '$product->id']) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <?= Html::submitButton('Купить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!--II-->
<div class="modal fade" id="myModalSet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Покупка товара</h4>
            </div>
            <div class="modal-body">
                <?php $form2 = ActiveForm::begin(['id' => 'OrderSet']); ?>
                <?= $form2->field($order_price_modal2, 'fio')->textInput(['maxlength' => true, 'placeholder' => 'Ф.И.О.']) ?>  
                <?= $form2->field($order_price_modal2, 'email')->textInput(['maxlength' => true]) ?>  
                <?= $form2->field($order_price_modal2, 'phone')->textInput(['maxlength' => true]) ?>  
                <?= $form2->field($order_price_modal2, 'good')->textInput(['id' => 'GoodSet', 'maxlength' => true, 'value' => '$product->name', 'disabled' => TRUE]) ?>  
                <?= $form2->field($order_price_modal2, 'quantity')->textInput(['type' => 'number', 'value' => 1]) ?>  
                <?= $form2->field($order_price_modal2, 'address')->textarea(['rows' => 3]) ?>  
                <?= $form2->field($order_price_modal2, 'good_id')->hiddenInput(['id' => 'GoodSetId', 'value' => '$product->id']) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <?= Html::submitButton('Купить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>