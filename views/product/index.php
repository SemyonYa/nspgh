<h1>Продукты по категориям</h1>
<div class="col-xs-3">
    <h5>Фильтры</h5>
</div>
<div class="col-xs-9">
    <?php foreach ($categories as $category): ?>
        <div class="col-xs-12 nsp-category">
            <h3><?= $category->name ?></h3>
            <div class="col-xs-12 nsp-product-list">
                <?php foreach ($products as $p): ?>
                    <?php if ($p->category_id === $category->id): ?>
                        <div class="nsp-product-list-item">
                            <a href="/product/view?id=<?= $p->id ?>">
                                <div class="col-xs-12 nsp-product-list-item-inner">
                                    <h6><?= $p->name ?> <br />(<?= $p->name_eng ?>)</h6>
                                    
                                    <img src="<?= \Yii::$app->imagemanager->getImagePath($p->img_id, '200', '200') ?>" />
                                    <div class="text-center">
                                        <b><?= $p->price ?>&#8381;</b> 
                                        <?php if ($p->price_without_discount > 0): ?>
                                            <span style="text-decoration: line-through"><?= $p->price_without_discount ?>&#8381;</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a> 
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

