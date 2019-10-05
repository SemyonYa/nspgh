<div class="col-xs-12 nsp-set-list">
    <h3 class="col-xs-12">Наборы NSP</h3>
    <?php foreach ($sets as $set): ?>
        <div class="nsp-set-list-item">
            <a href="/set/view?id=<?= $set->id ?>">
                <div class="col-xs-12 nsp-set-list-item-inner">
                    <span><?= $set->name ?> </span>
                    <div class="nsp-set-list-item-inner-img" style="background: url('<?= \Yii::$app->imagemanager->getImagePath($set->img_id, '300', '300', 'inset') ?>'); background-size: contain; background-position: center center; background-repeat: no-repeat"></div>
                    <div class="text-center nsp-set-list-item-inner-text">
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