<?php

use yeesoft\lightbox\Lightbox;

$pics = [
    [
        'thumb' => '/web/images/meat-02.png',
        'image' => '/web/images/meat-02.png',
        'title' => 'Продукт X',
        'group' => 'product-group',
    ],
    [
        'thumb' => '/web/images/meat-02.png',
        'image' => '/web/images/meat-02.png',
        'title' => 'Продукт X',
        'group' => 'product-group',
    ],
        [
        'thumb' => '/web/images/meat-02.png',
        'image' => '/web/images/meat-02.png',
        'title' => 'Продукт X',
        'group' => 'product-group',
    ],
];
?>
<div class="col-xs-12 nsp-product">
    <h1>Продукт X</h1>    
    <div class="col-xs-12 nsp-product-description">
        <div class="nsp-product-description-txt">
            <p>Описание продукта. Описание продукта. Описание продукта. Описание продукта. Описание продукта. Описание продукта. 
                Описание продукта. Описание продукта. Описание продукта. Описание продукта. Описание продукта. Описание продукта. 
                Описание продукта. Описание продукта. Описание продукта. Описание продукта. Описание продукта. 
            </p>
        </div>
        <div class="nsp-product-description-img">
            <img src="/web/images/meat-02.png" class="nsp-img-mini"/>
        </div>
    </div>
    <div class="col-xs-12 nsp-product-slider">
        <?= Lightbox::widget(['items' => $pics]); ?>
    </div>
</div>