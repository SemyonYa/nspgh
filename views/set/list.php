<div class="col-xs-12 col-sm-10 col-sm-offset-1 nsp-products">
    <div class="col-sm-3 nsp-products-filters">
        <h5>Фильтры</h5>
    </div>
    <div class="col-xs-12 col-sm-9 nsp-product-list">
        <?php foreach ($sets as $set): ?>
            <div class="nsp-product-list-item">
                <a href="/set/view?id=<?= $set->id ?>">
                    <div class="col-xs-12 nsp-product-list-item-inner">
                        <span><?= $set->name ?> </span>
                        <div class="nsp-product-list-item-inner-img" style="background: url('<?= \Yii::$app->imagemanager->getImagePath($set->img_id, '300', '300', 'inset') ?>'); background-size: contain; background-position: center center; background-repeat: no-repeat"></div>
                        <div class="text-center nsp-product-list-item-inner-text">
                            <b><?= ($set->CurrencyPrice()) ?>&#8381;</b>
                            <?php if ($set->price_without_discount > 0): ?>
                                <span style="text-decoration: line-through"><?= ($set->CurrencyPriceWithoutDiscount()) ?>&#8381;</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
