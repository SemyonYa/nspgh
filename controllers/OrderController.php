<?php

namespace app\controllers;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSuccess($order_id) {
        $order = \app\models\Order::findOne($order_id);
        $order_products = $order->orderProducts;
        $order_sets = $order->orderSets;
        $sum = 0;
        foreach ($order_products as $op) {
            $sum += $op->product->CurrencyPrice() * $op->quantity;
        }
        foreach ($order_sets as $os) {
            $sum += $os->set->CurrencyPrice() * $os->quantity;
        }
        return $this->render('success', compact('order', 'order_products', 'order_sets', 'sum'));
    }

}
