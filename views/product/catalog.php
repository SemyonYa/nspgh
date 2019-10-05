<?php $this->title = 'Каталог | ' . $this->title ?>
<div class="col-xs-12 nsp-catalog">
    <?php foreach ($categories as $category): ?>
        <a href="/product/category-products?id=<?=$category->id ?>">    
            <div class="nsp-catalog-item">
                <div class="nsp-catalog-item-title">
                    <?= $category->name ?>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<!--<div class="nsp-catalog-caption">
    
</div>-->