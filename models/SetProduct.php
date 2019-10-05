<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "set_products".
 *
 * @property integer $id
 * @property integer $set_id
 * @property integer $product_id
 * @property integer $quantity
 *
 * @property Products $product
 * @property Sets $set
 */
class SetProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'set_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['set_id', 'product_id', 'quantity'], 'required'],
            [['set_id', 'product_id', 'quantity'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['set_id'], 'exist', 'skipOnError' => true, 'targetClass' => Set::className(), 'targetAttribute' => ['set_id' => 'id']],
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
            'product_id' => 'Product ID',
            'quantity' => 'Количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSet()
    {
        return $this->hasOne(Set::className(), ['id' => 'set_id']);
    }
}
