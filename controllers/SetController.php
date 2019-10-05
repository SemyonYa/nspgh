<?php

namespace app\controllers;

class SetController extends \yii\web\Controller {

    public $layout = '_catalog';

    public function actionList() {
        $this->layout = '_empty';
        $sets = \app\models\Set::find()->all();
        return $this->render('list', compact('sets'));
    }

//    public function actionView($id) {
//        $model = \app\models\Set::findOne($id);
//        return $this->render('view', compact('model'));
//    }
    public function actionView($id) {
        $set = \app\models\Set::findOne($id);
        $order_modal = new \app\models\OrderModal();
        if ($order_modal->load(\Yii::$app->request->post())) {
            if ($order_modal->validate()) {
                $client = new \app\models\Client();
                $client->name = $order_modal->fio;
                $client->phone = $order_modal->phone;
                $client->mail = $order_modal->email;
                if ($client->save()) {
                    $order = new \app\models\Order();
                    $order->client_id = $client->id;
                    $order->name = 'Заказ №...';
                    $order->date = date('Y-m-d H:i:s');
                    $order->address = $order_modal->address;
                    if ($order->save()) {
                        $order->name = 'Заказ №' . $order->id;
                        $order->save();
                        $order_set = new \app\models\OrderSet();
                        $order_set->order_id = $order->id;
                        $order_set->set_id = $order_modal->good_id;
                        $order_set->quantity = $order_modal->quantity;
                        if ($order_set->save()) {
                            $html_body = '<a href="http://nsp-wellness.ru/admin/order/view?id=' . $order->id . '"><h4>Ссылка на новый заказ #' . $order->id . '</h4></a>';
                            \app\models\Order::SendMail(NULL, $html_body);
                            return $this->redirect('/order/success?order_id=' . $order->id);
                        }
                    }
                }
//                var_dump($order_modal);
//                die;
            }
        }
        return $this->render('view', compact('set', 'order_modal'));
    }

    public function actionSession($id) {
        $session = \Yii::$app->session;
        $sets = $session->get('sets');
        if (isset($sets[$id])) {
            $sets[$id] ++;
        } else {
            $sets[$id] = 1;
        }
        $session['sets'] = $sets;
        return count($session['sets']) + count($session['products']);
    }

    public function actionChange($id, $q) {
        $session = \Yii::$app->session;
        $sets = $session['sets'];
        $sets[$id] = $q;
        $session['sets'] = $sets;
        return $this->redirect('/product/cart');
    }

    public function actionRemove($id) {
        $session = \Yii::$app->session;
        $sets = $session['sets'];
        unset($sets[$id]);
        $session['sets'] = $sets;
        return $this->redirect('/product/cart');
    }

    public function actionSetData($id) {
        $set = \app\models\Set::findOne($id);
        $set_data = $set->id . '???_???' . $set->name;
        return $set_data;
    }

}
