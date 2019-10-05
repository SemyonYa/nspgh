<?php

use yeesoft\lightbox\Lightbox;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;

$pics = NULL;
if (!is_null($product->galery_1)) {
    $pics[1] = [
        'thumb' => Yii::$app->imagemanager->getImagePath($product->galery_1, '400', '400'),
        'image' => Yii::$app->imagemanager->getImagePath($product->galery_1, '400', '400'),
        'title' => $product->name,
        'group' => 'product-group',
    ];
}
if (!is_null($product->galery_2)) {
    $pics[2] = [
        'thumb' => Yii::$app->imagemanager->getImagePath($product->galery_2, '400', '400'),
        'image' => Yii::$app->imagemanager->getImagePath($product->galery_2, '400', '400'),
        'title' => $product->name,
        'group' => 'product-group',
    ];
}
if (!is_null($product->galery_3)) {
    $pics[3] = [
        'thumb' => Yii::$app->imagemanager->getImagePath($product->galery_3, '400', '400'),
        'image' => Yii::$app->imagemanager->getImagePath($product->galery_3, '400', '400'),
        'title' => $product->name,
        'group' => 'product-group',
    ];
}
?>
<div class="col-xs-12 col-md-10 col-md-offset-1 nsp-product">
    <h3><?= $product->name ?> <br /> (<?= $product->name_eng ?>)</h3>    

    <div class="col-xs-12 nsp-product-description">
        <div class="col-xs-12 nsp-product-description-ti">
            <div class="nsp-product-description-txt">
                <b><?= $product->brief_description ?></b>
                <h4>Количество: <?= $product->quantity ?> </h4>
                <h4> Цена: 
                    <?= $product->CurrencyPrice() ?>&#8381;
                    <?php if ($product->price_without_discount != 0): ?>
                        <span style="text-decoration: line-through"> (<?= $product->CurrencyPriceWithoutDiscount() ?>&#8381;)</span>
                    <?php endif; ?>
                </h4>
            </div>
            <div class="nsp-product-description-img" style="background: url('<?= \Yii::$app->imagemanager->getImagePath($product->img_id, '400', '400', 'inset') ?>'); background-size: contain; background-position: center center; background-repeat: no-repeat">

            </div>
        </div>
        <div class="col-xs-12 nsp-product-description-ab">
            <div class="panel-group nsp-product-description-accordeon" id="accordion" role="tablist" aria-multiselectable="true">
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
                            <?= $product->full_description ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="nsp-accordeon-inner">Применение</div>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <?= $product->how_use ?>
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
                            <?= $product->composition ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <div class="nsp-accordeon-inner">Противопоказания</div>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <?= $product->contraindications ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <div class="nsp-accordeon-inner">Условия хранения</div>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class="panel-body">
                            <?= $product->storage ?>
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
                            <?= $product->video ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSeven">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <div class="nsp-accordeon-inner">Отзывы о товаре</div>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">
                            <button class="btn btn-primary nsp-btn-buying" data-toggle="modal" data-target="#CommentModal">Оставить отзыв...</button>
                            <div class="nsp-product-comments">
                                <?php foreach ($product->comments as $comment): ?>
                                    <?php if ($comment->hidden != 1): ?>
                                        <div class="nsp-product-comment">
                                            <b><?= $comment->title ?></b>
                                            <p><?= $comment->description ?></p>
                                            <i><?= $comment->name ?></i>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 nsp-product-description-buy">
                <button class="btn btn-primary nsp-btn-buying" data-toggle="modal" data-target="#myModal">Быстрая покупка</button> <!--onclick="alert('Модальное окно покупки')" -->
                <button id="ToCart" class="btn btn-primary nsp-btn-buying" onclick="ProdToCart(<?= $product->id ?>)">В корзину</button>
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
                <?= $form2->field($order_modal, 'good')->textInput(['maxlength' => true, 'value' => $product->name, 'disabled' => TRUE]) ?>  
                <?= $form2->field($order_modal, 'quantity')->textInput(['type' => 'number', 'value' => 1]) ?>  
                <?= $form2->field($order_modal, 'address')->textarea(['rows' => 3]) ?>  
                <?= $form2->field($order_modal, 'good_id')->hiddenInput(['value' => $product->id]) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <?= Html::submitButton('Купить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Модаль -->  
<div class="modal fade" id="CommentModal" tabindex="-1" role="dialog" aria-labelledby="CommentModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Оставить отзыв о товаре</h4>
            </div>
            <div class="modal-body">
                <?php $form3 = ActiveForm::begin(['id' => 'Comment']); ?>
                <?= $form3->field($new_comment, 'title')->textarea() ?>  
                <?= $form3->field($new_comment, 'description')->textarea() ?>  
                <?= $form3->field($new_comment, 'name')->textInput() ?>  
                <?=
                $form3->field($new_comment, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div>{input}</div><div>{image}</div>',
                ])
                ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>