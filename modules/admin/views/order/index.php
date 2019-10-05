<?php

use yii\helpers\Html;

//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список заказов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-xs-12 nsp-admin-order-filters">
        <input name="status[]" type="radio" value="100" id="all" onchange="ChangeOrderList(100)" checked /><label for="all">ВСЕ</label>
        <input name="status[]" type="radio" value="0" id="new" onchange="ChangeOrderList(0)"/><label for="new">Новые</label>
        <input name="status[]" type="radio" value="1" id="during" onchange="ChangeOrderList(1)" /><label for="during">В работе</label>
        <input name="status[]" type="radio" value="10" id="closed" onchange="ChangeOrderList(10)" /><label for="closed">Завершенные</label>
    </div>
    <div class="col-xs-12">
        <table class="table">
            <thead>
                <tr>
                    <td>№</td>
                    <td>Заказчик</td>
                    <td>Дата</td>
                    <td>Статус</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0 ?>
                <?php foreach ($orders as $o): ?>
                    <?php $no++; ?>    
                    <tr class="search-filter" data-param="<?= $o->status?>">
                        <td><?= $no ?></td>
                        <td>
                            <?= $o->client->name ?><br>
                            <?= $o->client->mail ?><br>
                            <?= $o->client->phone ?><br>                           
                        </td>
                        <td><?= $o->date ?></td>
                        <td>
                            <?php 
                                if ($o->status === 0) {
                                    echo '<span class="text-danger">Новый</span>';
                                } elseif ($o->status === 1) {
                                    echo '<span class="text-warning">В работе</span>';
                                } elseif ($o->status === 10) {
                                    echo '<span class="text-success">Завершенный</span>';
                                } 
                            ?>
                        </td>
                        <td><a href="/admin/order/view?id=<?=$o->id?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td>
                            <a href="/admin/order/update?id=<?=$o->id?>&s=0" class="nsp-order-action <?= $o->status === 0 ? 'text-danger' : 'text-info' ?>" title="Отметить как новый" <?= $o->status === 0 ? 'disabled' : '' ?>><span class="glyphicon glyphicon-exclamation-sign"></span></a>
                            <a href="/admin/order/update?id=<?=$o->id?>&s=1" class="nsp-order-action <?= $o->status === 1 ? 'text-warning' : 'text-info' ?>" title="Взять в работу" <?= $o->status === 1 ? 'disabled' : '' ?>><span class="glyphicon glyphicon-play"></span></a>
                            <a href="/admin/order/update?id=<?=$o->id?>&s=10" class="nsp-order-action <?= $o->status === 10 ? 'text-success' : 'text-info' ?>" title="Завершить" <?= $o->status === 10 ? 'disabled' : '' ?>><span class="glyphicon glyphicon-ok"></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
