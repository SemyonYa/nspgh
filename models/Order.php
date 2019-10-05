<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property integer $client_id
 *
 * @property OrderProducts[] $orderProducts
 * @property Clients $client
 */
class Order extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'orders';
    }

    public function rules() {
        return [
            [['name', 'date', 'client_id'], 'required'],
            [['date', 'address'], 'safe'],
            [['client_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 100],
//            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'client_id' => 'Client ID',
        ];
    }

    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
    }
    public function getProducts() {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
                        ->viaTable('order_products', ['order_id' => 'id']);
    }
    
    public function getOrderSets()
    {
        return $this->hasMany(OrderSet::className(), ['order_id' => 'id']);
    }
    public function getSets() {
        return $this->hasMany(Set::className(), ['id' => 'set_id'])
                        ->viaTable('order_sets', ['order_id' => 'id']);
    }

    public function getClient() {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }
    
    
    public static function SendMail($subject, $html_body) {
        if (is_null($subject)) 
            $subject = 'Новый заказ';
        if (is_null($html_body))
            $html_body = '<h2>Hello, World)</h2>';
        \Yii::$app->mailer->compose()
                ->setTo('orders@nsp-wellness.ru')
                ->setFrom(['info@nsp-wellness.ru' => 'NSP Wellness'])
                ->setSubject($subject)
                ->setHtmlBody($html_body)
                ->send();
    }
//    public function RenderMailBody($id) {
//        $order = Order::findOne($id);
//        return require_once '../views/order/mail_body.php';
//    }
}
