<?php

use yeesoft\lightbox\Lightbox;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$pics = NULL;
if (!is_null($set->galery_1)) {
    $pics[1] = [
        'thumb' => Yii::$app->imagemanager->getImagePath($set->galery_1, '400', '400'),
        'image' => Yii::$app->imagemanager->getImagePath($set->galery_1, '400', '400'),
        'title' => $set->name,
        'group' => 'product-group',
    ];
}
if (!is_null($set->galery_2)) {
    $pics[2] = [
        'thumb' => Yii::$app->imagemanager->getImagePath($set->galery_2, '400', '400'),
        'image' => Yii::$app->imagemanager->getImagePath($set->galery_2, '400', '400'),
        'title' => $set->name,
        'group' => 'product-group',
    ];
}
if (!is_null($set->galery_3)) {
    $pics[3] = [
        'thumb' => Yii::$app->imagemanager->getImagePath($set->galery_3, '400', '400'),
        'image' => Yii::$app->imagemanager->getImagePath($set->galery_3, '400', '400'),
        'title' => $set->name,
        'group' => 'product-group',
    ];
}
?>
<div class="col-xs-12 col-md-10 col-md-offset-1 nsp-product">
    <h3><?= $set->name ?></h3>    
    <div class="col-xs-12 nsp-product-description">
        <div class="col-xs-12 nsp-product-description-ti">
            <div class="nsp-product-description-txt">
                <b><?= $set->brief_description ?></b>
                <b><h3>
                        <?= $set->CurrencyPrice() ?>&#8381;
                        <?php if ($set->price_without_discount != 0): ?>
                            <span style="text-decoration: line-through"> (<?= $set->CurrencyPriceWithoutDiscount() ?>&#8381;)</span>
                        <?php endif; ?>
                    </h3></b>
            </div>
            <div class="nsp-product-description-img" style="background: url('<?= \Yii::$app->imagemanager->getImagePath($set->img_id, '400', '400', 'inset') ?>'); background-size: contain; background-position: center center; background-repeat: no-repeat">
            </div>
        </div>
        <!--</div>-->
        <div class="col-xs-12 nsp-product-description-ab">
            <div class="col-xs-12 panel-group nsp-product-description-accordeon" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="nsp-accordeon-inner">Полное описание</div>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <?= $set->full_description ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <div class="nsp-accordeon-inner">Применение</div>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <?= $set->how_use ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div class="nsp-accordeon-inner">Состав</div>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <?php foreach ($set->setProducts as $sp): ?>
                                <a href="/product/view?id=<?= $sp->product->id ?>"><?= $sp->product->name ?> &mdash; <?= $sp->quantity?></a><br />
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSix">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <div class="nsp-accordeon-inner">Видео</div>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">
                            <?= $set->video ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 nsp-product-description-buy">
                <button class="btn btn-primary nsp-btn-buying" data-toggle="modal" data-target="#myModal">Быстрая покупка</button> <!--onclick="alert('Модальное окно покупки')" -->
                <button id="ToCart" class="btn btn-primary nsp-btn-buying" onclick="SetToCart(<?= $set->id ?>)">В корзину</button>
            </div>
        </div>

    </div>
    <?php if (!is_null($pics)): ?>
        <div class="col-xs-12 nsp-product-slider">
            <?= Lightbox::widget(['items' => $pics]); ?>
        </div>
    <?php endif; ?>
</div>

<!-- Модаль -->  
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Покупка товара</h4>
            </div>
            <div class="modal-body">
                <?php $form2 = ActiveForm::begin(['id' => 'Order']); ?>
                <?= $form2->field($order_modal, 'fio')->textInput(['maxlength' => true, 'placeholder' => 'Ф.И.О.']) ?>  
                <?= $form2->field($order_modal, 'email')->textInput(['maxlength' => true]) ?>  
                <?= $form2->field($order_modal, 'phone')->textInput(['maxlength' => true]) ?>  
                <?= $form2->field($order_modal, 'good')->textInput(['maxlength' => true, 'value' => $set->name, 'disabled' => TRUE]) ?>  
                <?= $form2->field($order_modal, 'quantity')->textInput(['type' => 'number', 'value' => 1]) ?>  
                <?= $form2->field($order_modal, 'address')->textarea(['rows' => 3]) ?>  
                <?= $form2->field($order_modal, 'good_id')->hiddenInput(['value' => $set->id]) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <?= Html::submitButton('Купить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>