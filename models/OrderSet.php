<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_sets".
 *
 * @property integer $id
 * @property integer $set_id
 * @property integer $order_id
 * @property integer $quantity
 *
 * @property Orders $order
 * @property Sets $set
 */
class OrderSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_sets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['set_id', 'order_id', 'quantity'], 'required'],
            [['set_id', 'order_id', 'quantity'], 'integer'],
//            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
//            [['set_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sets::className(), 'targetAttribute' => ['set_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'set_id' => 'Set ID',
            'order_id' => 'Order ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSet()
    {
        return $this->hasOne(Set::className(), ['id' => 'set_id']);
    }
}
