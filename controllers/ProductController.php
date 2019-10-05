<?php

namespace app\controllers;

class ProductController extends \yii\web\Controller {

    public $layout = '_catalog';

    public function actionIndex() {
        $categories = \app\models\Category::find()->all();
        $products = \app\models\Product::find()->all();
        return $this->render('index', compact('products', 'categories'));
    }

    public function actionView($id) {
        $product = \app\models\Product::findOne($id);
        $order_modal = new \app\models\OrderModal();
        $new_comment = new \app\models\NewComment();
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
                        $order_product = new \app\models\OrderProduct();
                        $order_product->order_id = $order->id;
                        $order_product->product_id = $order_modal->good_id;
                        $order_product->quantity = $order_modal->quantity;
                        if ($order_product->save()) {
                            $html_body = '<a href="http://nsp-wellness.ru/admin/order/view?id=' . $order->id . '"><h4>Ссылка на новый заказ #' . $order->id . '</h4></a>';
                            \app\models\Order::SendMail(NULL, $html_body);
                            return $this->redirect('/order/success?order_id=' . $order->id);
                        }
                    }
                }
            }
        }
        if ($new_comment->load(\Yii::$app->request->post())) {
            if ($new_comment->validate()) {
                $comment = new \app\models\Comment();
                $comment->title = $new_comment->title;
                $comment->description = $new_comment->description;
                $comment->name = $new_comment->name;
                $comment->product_id = $id;
                $comment->hidden = 0;
                if ($comment->save()) {
                    return $this->refresh();
                }
            }
        }
        return $this->render('view', compact('product', 'order_modal', 'new_comment'));
    }

    public function actionCatalog() {
        $this->layout = '_empty';
        $categories = \app\models\Category::find()->all();
        return $this->render('catalog', compact('categories'));
    }

    public function actionCategoryProducts($id) {
        $category = \app\models\Category::findOne($id);
        $filters = \app\models\Fltr::findAll(['category_id' => $category->id]);
        return $this->render('category-products', compact('category', 'filters'));
    }

    public function actionProductsAjax($cat_id) {
        $this->layout = '_empty';
        $products = \app\models\Product::findAll(['category_id' => $cat_id]);
        return $this->render('products-ajax', compact('products'));
    }

    public function actionProductsSearchAjax($data) {
        $this->layout = '_empty';
        $data_r = explode('___', $data);
        unset($data_r[count($data_r) - 1]);
        $f_children = \app\models\Fltr::findAll($data_r);
        $filter_tree = [];
        foreach ($f_children as $f) {
            $filter_tree[$f->parent->id][] = $f->id;
        }
        $products = \app\models\Product::find()->all();


        foreach ($filter_tree as $f) {
            foreach ($products as $p) {
                $current_filters = [];
                foreach ($p->fltrs as $fltr) {
                    $current_filters[] = $fltr->id;
                }
                if (count(array_intersect($current_filters, $f)) == 0) {
                    unset($products[array_search($p, $products, true)]);
                }
            }
        }
        return $this->render('products-ajax', compact('products'));
    }

    public function actionSearch() {
        $categories = \app\models\Category::find()->all();
        $products = [];
        $message = '';
        if ($_POST) {
            $search_data = trim($_POST['data']);
            if ($search_data == '') {
                $message = 'Empty request';
            } else {
                $products = \app\models\Product::find()->where(['like', 'name', $search_data])->all(); //search parameters for SELECT in DB 
            }
        }
        return $this->render('search-result', compact('products', 'categories', 'message'));
    }

    public function actionSearchAjax($name) {
        $this->layout = '_empty';
        $quick_products = \app\models\Product::find()->where(['like', 'name', $name])->all();
        return $this->render('search-result-ajax', compact('quick_products'));
    }

    public function actionCart() {
        $this->layout = '_cart';
        $this->CheckCookies();
        $session = \Yii::$app->session;
        $session_products = $session->get('products');
        $i = 0;
        $product_ids = NULL;
        $products = NULL;
        if ($session_products == NULL) {
            
        } else {
            foreach ($session_products as $key => $value) {
                $i++;
                $product_ids[$i] = $key;
            }
            $products = \app\models\Product::findAll($product_ids);
        }
        $session_sets = $session->get('sets');
        $j = 0;
        $set_ids = NULL;
        $sets = NULL;
        if ($session_sets == NULL) {
            
        } else {
            foreach ($session_sets as $key => $value) {
                $j++;
                $set_ids[$j] = $key;
            }
            $sets = \app\models\Set::findAll($set_ids);
        }
        return $this->render('cart', compact('products', 'session_products', 'sets', 'session_sets'));
    }

    public function actionCleanCart() {
        $session = \Yii::$app->session;
        unset($session['products']);
        unset($session['sets']);
        return $this->redirect('/product/cart');
    }

    public function CheckCookies() {
        $session = \Yii::$app->session;

        $products = $session->get('products');
        if ($products !== NULL) {
            foreach ($products as $key => $value) {
                if ($value == 0) {
                    unset($products[$key]);
                }
            }
        }
        $session['products'] = $products;

        $sets = $session->get('sets');
        if ($sets !== NULL) {
            foreach ($sets as $key => $value) {
                if ($value == 0) {
                    unset($sets[$key]);
                }
            }
        }
        $session['sets'] = $sets;
    }

    public function actionSession($id) {
        $session = \Yii::$app->session;
        $products = $session->get('products');
        if (isset($products[$id])) {
            $products[$id] ++;
        } else {
            $products[$id] = 1;
        }
        $session['products'] = $products;
        return count($session['sets']) + count($session['products']);
    }

    public function actionSessionView() {
        $session = \Yii::$app->session;
        $sets = $session->get('sets');
        return serialize($sets);
//        var_dump($products);
    }

    public function actionChange($id, $q) {
        $session = \Yii::$app->session;
        $products = $session['products'];
        $products[$id] = $q;
        $session['products'] = $products;
        return $this->redirect('/product/cart');
    }

    public function actionRemove($id) {
        $session = \Yii::$app->session;
        $products = $session['products'];
        unset($products[$id]);
        $session['products'] = $products;
        return $this->redirect('/product/cart');
    }

    public function actionForm() {
        $this->layout = '_empty';
        $order_cart = new \app\models\OrderCart();
        if ($order_cart->load(\Yii::$app->request->post())) {
            if ($order_cart->validate()) {
                $client = new \app\models\Client();
                $client->name = $order_cart->fio;
                $client->phone = $order_cart->phone;
                $client->mail = $order_cart->email;
                if ($client->save()) {
                    $order = new \app\models\Order();
                    $order->client_id = $client->id;
                    $order->name = 'Заказ №...';
                    $order->date = date('Y-m-d H:i:s');
                    $order->address = $order_cart->address;
                    if ($order->save()) {
                        $order->name = 'Заказ №' . $order->id;
                        $order->save();
                        $session = \Yii::$app->session;

                        $products = $session['products'];
                        if (!is_null($products)) {
                            foreach ($products as $key => $value) {
                                $order_product = new \app\models\OrderProduct();
                                $order_product->order_id = $order->id;
                                $order_product->product_id = $key;
                                $order_product->quantity = $value;
                                $order_product->save();
                            }
                            unset($session['products']);
                        }

                        $sets = $session['sets'];
                        if (!is_null($sets)) {
                            foreach ($sets as $key => $value) {
                                $order_set = new \app\models\OrderSet();
                                $order_set->order_id = $order->id;
                                $order_set->set_id = $key;
                                $order_set->quantity = $value;
                                $order_set->save();
                            }
                            unset($session['sets']);
                        }
                        $html_body = '<a href="http://nsp-wellness.ru/admin/order/view?id=' . $order->id . '"><h4>Ссылка на новый заказ #' . $order->id . '</h4></a>';
                        \app\models\Order::SendMail(NULL, $html_body);

                        return $this->redirect('/order/success?order_id=' . $order->id);
                    }
                }
            }
        }
        return $this->render('form', compact('order_cart'));
    }

    public function actionPriceList() {
        $this->layout = '_price';
        $currency = \app\models\Product::Currency()->value;
        $session = \Yii::$app->session;
        $categories = \app\models\Category::find()->all();
        $products_r = $session['products'];
        $products = \app\models\Product::find()->all();
        $sets_r = $session['sets'];
        $sets = \app\models\Set::find()->all();
        $order_price_modal = new \app\models\OrderModal();
        if ($order_price_modal->load(\Yii::$app->request->post())) {
            if ($order_price_modal->validate()) {
                $client = new \app\models\Client();
                $client->name = $order_price_modal->fio;
                $client->phone = $order_price_modal->phone;
                $client->mail = $order_price_modal->email;
                if ($client->save()) {
                    $order = new \app\models\Order();
                    $order->client_id = $client->id;
                    $order->name = 'Заказ №...';
                    $order->date = date('Y-m-d H:i:s');
                    $order->address = $order_price_modal->address;
                    if ($order->save()) {
                        $order->name = 'Заказ №' . $order->id;
                        $order->save();
                        $order_product = new \app\models\OrderProduct();
                        $order_product->order_id = $order->id;
                        $order_product->product_id = $order_price_modal->good_id;
                        $order_product->quantity = $order_price_modal->quantity;
                        if ($order_product->save()) {
                            $html_body = '<a href="http://nsp-wellness.ru/admin/order/view?id=' . $order->id . '"><h4>Ссылка на новый заказ #' . $order->id . '</h4></a>';
                            \app\models\Order::SendMail(null, $html_body);
                            return $this->redirect('/order/success?order_id=' . $order->id);
                        }
                    }
                }
            }
        }
        $order_price_modal2 = new \app\models\OrderModal();
        if ($order_price_modal2->load(\Yii::$app->request->post())) {
            if ($order_price_modal2->validate()) {
                $client2 = new \app\models\Client();
                $client2->name = $order_price_modal2->fio;
                $client2->phone = $order_price_modal2->phone;
                $client2->mail = $order_price_modal2->email;
                if ($client2->save()) {
                    $order2 = new \app\models\Order();
                    $order2->client_id = $client2->id;
                    $order2->name = 'Заказ №...';
                    $order2->date = date('Y-m-d H:i:s');
                    $order2->address = $order_price_modal2->address;
                    if ($order2->save()) {
                        $order2->name = 'Заказ №' . $order2->id;
                        $order2->save();
                        $order_set = new \app\models\OrderSet();
                        $order_set->order_id = $order2->id;
                        $order_set->product_id = $order_price_modal2->good_id;
                        $order_set->quantity = $order_price_modal2->quantity;
                        if ($order_set->save()) {
                            $html_body = '<a href="http://nsp-wellness/admin/order/view?id=' . $order->id . '"><h4>Ссылка на новый заказ #' . $order->id . '</h4></a>';
                            \app\models\Order::SendMail(null, $html_body);
                            return $this->redirect('/order/success?order_id=' . $order->id);
                        }
                    }
                }
//                var_dump($order_price_modal);
//                die;
            }
        }
        return $this->render('price-list', compact('categories', 'products', 'products_r', 'sets', 'sets_r', 'order_price_modal', 'order_price_modal2', 'currency'));
    }

    public function actionProdData($id) {
        $prod = \app\models\Product::findOne($id);
        $prod_data = $prod->id . '???_???' . $prod->name;
        return $prod_data;
    }

    public function actionCurrencyToday() {
        $content = file_get_contents('http://nsp.com.ru');
        $position = strpos($content, 'у.е.');
        $content = substr($content, $position, 21);
        $content = str_replace('у.е. = ', '', $content);
        $content = str_replace('<b>', '', $content);
        $content = str_replace('</b>', '', $content);
        $current = \app\models\Product::Currency();
        if (date('Y-m-d', strtotime($current->date)) === date('Y-m-d')) {
            return 'Сегодня операция уже выполнялась!';
        } else {
            $currency = new \app\models\Currency();
            $currency->value = $content;
            $currency->date = date('Y-m-d H:i:s');
            $currency->save();
            return 'Добавлена запись курса валют на ' . date('Y-m-d', strtotime($currency->date)) . ': ' . $currency->value;
        }
    }

}
