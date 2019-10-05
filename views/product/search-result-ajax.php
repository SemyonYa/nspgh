<div>
    <?php if (count($quick_products) > 0): ?>
        <?php foreach ($quick_products as $quick_p): ?>
            <div class="nsp-search-result-active-item">
                <a href="/product/view?id=<?= $quick_p->id ?>">
                    <div class="nsp-search-result-active-item-a">
                        <div class="nsp-search-result-active-item-img">
                            <img src="<?= \Yii::$app->imagemanager->getImagePath($quick_p->img_id, '100', '100') ?>" />
                        </div>
                        <div class="nsp-search-result-active-item-title">
                            <b><?= $quick_p->name ?></b> (#<?= $quick_p->name_eng ?>)
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="nsp-search-result-active-empty">
            <h3>По запросу ничего не найдено!</h3>
        </div>
    <?php endif; ?>
</div>