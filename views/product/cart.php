
<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 nsp-cart">
    <h1>Корзина <a href="/product/clean-cart"><span class="glyphicon glyphicon-trash"></span></a></h1>
    <?php if ($products == NULL && $sets == NULL) : ?>
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4>Нет выбранных товаров</h4>
        </div>
    <?php else: ?>
        <table class="col-xs-12">
    <!--        <thead>
                <tr>
                    <td></td>
                    <td colspan="2">Наименование</td>
                    <td>Кол-во</td>
                    <td>Цена</td>
                    <td>Стоимость</td>
                </tr>
            </thead>-->
            <tbody>
                <?php
                $i = 0;
                $sum = 0;
                ?>
                <?php if ($sets != NULL): ?>
                    <?php foreach ($sets as $s): ?>
                        <?php
                        $i++;
                        $sum += $s->CurrencyPrice() * $session_sets[$s->id];
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <img src="<?= \Yii::$app->imagemanager->getImagePath($s->img_id, '100', '100') ?>" class="" />
                            </td>
                            <td>
                                <a href="/set/view?id=<?= $s->id ?>"><?= $s->name ?></a> 
                            </td>
                            <td>
                                <?= $s->CurrencyPrice() ?>&#8381;
                            </td>
                            <td>
                                <input data-name="prods" data-id="<?= $s->id ?>" onchange="ChangeSetQuantity(this)" type="number" name="products[]" value="<?= $session_sets[$s->id] ?>" class="form-control"/>
                            </td>
                            <td>
                                <?= ($s->CurrencyPrice() * $session_sets[$s->id]) ?>&#8381;
                            </td> 
                            <td>
                                <span class="glyphicon glyphicon-remove nsp-cart-prod-remove" onclick="RemoveSet(<?= $s->id ?>)"></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($products != NULL): ?>
                    <?php foreach ($products as $p): ?>
                        <?php
                        $i++;
                        $sum += $p->CurrencyPrice() * $session_products[$p->id];
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <img src="<?= \Yii::$app->imagemanager->getImagePath($p->img_id, '100', '100') ?>" class="" />
                            </td>
                            <td>
                                <a href="/product/view?id=<?= $p->id ?>"><?= $p->name ?></a> 
                            </td>
                            <td>
                                <input data-name="prods" data-id="<?= $p->id ?>" onchange="ChangeProdQuantity(this)" type="number" name="products[]" value="<?= $session_products[$p->id] ?>" class="form-control"/>
                            </td>
                            <td>
                                <?= $p->CurrencyPrice() ?>&#8381;
                            </td>
                            <td>
                                <?= ($p->CurrencyPrice() * $session_products[$p->id]) ?>&#8381;
                            </td>
                            <td>
                                <span class="glyphicon glyphicon-remove nsp-cart-prod-remove" onclick="RemoveProduct(<?= $p->id ?>)"></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <b>Сумма заказа без учета стоимости доставки (Стоимость доставки сообщит менеджер)</b>
                    </td>
                    <td>
                        <?= $sum ?>&#8381;
                    </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <h3><b><a href="/delivery">Информацию о доставке и оплате можно просмотреть здесь</a></b></h3>
        <div id="ButtonField" class="col-xs-12 nsp-cart-sidebar">
            <button class="btn btn-primary" onclick="ViewCartForm()">Оформить заказ...</button>
        </div>
        <div id="CartForm" class="col-xs-12">
            <!--FORM TO INPUT CUSTOMER DATA-->
        </div>
        <div class="col-xs-12 nsp-25">
            <a href="http://nsp25.com">Зарегистрироваться на официальном сайте компании Nature Sunshine <span class="glyphicon glyphicon-new-window"></span></a>
        </div>
    <?php endif; ?>
</div>