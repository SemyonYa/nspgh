<div class="col-xs-12 nsp-success">
    <hr class="col-xs-12" />
    <span class="nsp-success-caption">
        <?= $order->name ?> успешно оформлен! <br />
        В ближайшее время менеджер перезвонит Вам.
    </span>

    <h3>Ваш заказ:</h3>
    <table class="table table-bordered">
        <?php foreach ($order_sets as $os): ?>
            <tr>
                <td><?= $os->set->name ?></td>
                <td><?= $os->set->CurrencyPrice() ?></td>
                <td><?= $os->quantity ?> </td>
                <td><?= ($os->set->CurrencyPrice() * $os->quantity) ?>&#8381;</td>
            </tr>
        <?php endforeach; ?>
        <?php foreach ($order_products as $op): ?>
            <tr>
                <td><?= $op->product->name ?></td>
                <td><?= $op->product->CurrencyPrice() ?></td>
                <td><?= $op->quantity ?></td>
                <td><?= ($op->product->CurrencyPrice() * $op->quantity) ?>&#8381; </td>
            </tr>
        <?php endforeach; ?>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><b><?= $sum ?>&#8381</b></td>
            </tr>
        </tfoot>
    </table>
    <h5>Уточнить информацию о заказе можно по телефону:<br /> <a href="tel:88005116998">8-800-511-69-98 <span class="glyphicon glyphicon-phone-alt"></span></a></h5>
    <h5>Или по электронной почте: <br /> <a href="mailto:info@nsp-wellness.ru">info@nsp-wellness.ru <span class="glyphicon glyphicon-envelope"></span></a></h5>
    <br>
    <br />
    <span class="nsp-success-caption"><a href="/delivery">Информацию о доставке и оплате можно просмотреть здесь</a></span>
</div>