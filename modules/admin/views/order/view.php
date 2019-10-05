<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nsp-admin-order-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <tr>
            <td>Данные заказчика</td>
            <td>
                <?= $model->client->name ?><br>
                <?= $model->client->mail ?><br>
                <?= $model->client->phone ?><br>                
            </td>
        </tr>
        <tr>
            <td>Продукты заказа</td>
            <td>
                <ol>
                    <?php foreach ($model->orderProducts as $op): ?>
                        <li><?= $op->product->name ?> - <span class="text-success"><?= $op->quantity ?></span></li>
                    <?php endforeach; ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td>Адрес доставки</td>
            <td><?=$model->address ?></td>
        </tr>
        <tr>
            <td>Дата заказа</td>
            <td><?= $model->date ?></td>
        </tr>
        <tr>
            <td>Статус заказа</td>
            <td>
                <a href="/admin/order/update?id=<?= $model->id ?>&s=0" class="nsp-order-action <?= $model->status === 0 ? 'text-danger' : 'text-info' ?>" title="Отметить как новый" <?= $model->status === 0 ? 'disabled' : '' ?>><span class="glyphicon glyphicon-warning-sign"></span></a>
                <a href="/admin/order/update?id=<?= $model->id ?>&s=1" class="nsp-order-action <?= $model->status === 1 ? 'text-warning' : 'text-info' ?>" title="Взять в работу" <?= $model->status === 1 ? 'disabled' : '' ?>><span class="glyphicon glyphicon-play"></span></a>
                <a href="/admin/order/update?id=<?= $model->id ?>&s=10" class="nsp-order-action <?= $model->status === 10 ? 'text-success' : 'text-info' ?>" title="Завершить" <?= $model->status === 10 ? 'disabled' : '' ?>><span class="glyphicon glyphicon-exclamation-sign"></span></a>
            </td>
        </tr>
    </table>

</div>
