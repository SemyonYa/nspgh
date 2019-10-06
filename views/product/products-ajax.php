<div class="col-xs-12 nsp-product-list">
    <?php foreach ($products as $p): ?>
            <div class="nsp-product-list-item">
                <a href="/product/view?id=<?= $p->id ?>">
                    <div class="col-xs-12 nsp-product-list-item-inner">
                        <span><?= $p->name ?> <br />(<?= $p->name_eng ?>)</span>
                        <div class="nsp-product-list-item-inner-img" style="background-image: url('<?= \Yii::$app->imagemanager->getImagePath($p->img_id, '300', '300', 'inset') ?>');"></div>
                        <!-- <img src="<?php //echo \Yii::$app->imagemanager->getImagePath($p->img_id, '200', '200', 'outbound') ?>" /> -->
                        <div class="text-center nsp-product-list-item-inner-text ">
                            <b><?= ($p->CurrencyPrice()) ?>&#8381;</b> 
                            <?php if ($p->price_without_discount > 0): ?>
                                <span style="text-decoration: line-through"><?= ($p->CurrencyPriceWithoutDiscount()) ?>&#8381;</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a> 
            </div>
    <?php endforeach; ?>
</div>