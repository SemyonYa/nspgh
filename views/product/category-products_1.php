<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $this->title = $category->name ?>

<div class="col-xs-12 col-sm-10 col-sm-offset-1 nsp-products">
    <div class="col-sm-3 nsp-products-filters">
        <h5>Фильтры</h5>
        <!--ACCORDEON START-->
        <button class="btn btn-primary nsp-filter-btn" onclick="FilteringProductList()">Применить фильтры</button>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php foreach ($filters as $f): ?>
                <div class="panel panel-default">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $f->id ?>" aria-expanded="true" aria-controls="collapse<?= $f->id ?>">
                        <div class="panel-heading" role="tab" id="heading<?= $f->id ?>">
                            <h4 class="panel-title">

                                <?= $f->name ?>

                            </h4>
                        </div>
                    </a>
                    <div id="collapse<?= $f->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $f->id ?>">
                        <div class="panel-body">
                            <?php if ($f->children): ?>
                                <?php foreach ($f->children as $f_ch): ?>
                                    <input type="checkbox" id="check<?= $f_ch->id ?>" value="<?= $f_ch->id ?>" data-filter="plus" /><label for="check<?= $f_ch->id ?>"><?=$f_ch->name ?></label><br />
                                    <?php //echo yii\helpers\Html::checkbox('filters[]', FALSE, ['value' => $f_ch->id, 'label' => $f_ch->name]) ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!--ACCORDEON END-->
    </div>
    <div class="col-xs-12 col-sm-9">
        <?php if (Yii::$app->request->url === '/product/category-products?id=1'): ?>
            <div class="col-xs-12" id="NspSetList">NSP</div>
        <?php endif; ?>
        <div class="col-xs-12" id="NspProductList"></div>
        <div class="col-xs-12 nsp-product-list">
            <?php foreach ($products as $p): ?>
                <?php if ($p->category_id === $category->id): ?>
                    <div class="nsp-product-list-item">
                        <a href="/product/view?id=<?= $p->id ?>">
                            <div class="col-xs-12 nsp-product-list-item-inner">
                                <h6><?= $p->name ?> <br />(<?= $p->name_eng ?>)</h6>

                                <img src="<?= \Yii::$app->imagemanager->getImagePath($p->img_id, '200', '200') ?>" />
                                <div class="text-center">
                                    <b><?= ($p->CurrencyPrice()) ?>&#8381;</b> 
                                    <?php if ($p->price_without_discount > 0): ?>
                                        <span style="text-decoration: line-through"><?= ($p->CurrencyPriceWithoutDiscount()) ?>&#8381;</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a> 
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        LoadProductList();
        var exist = $('#NspSetList');
        if (exist.text() !== '') {
            LoadSetList();
        }
    });
</script>