<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_fltrs".
 *
 * @property integer $product_id
 * @property integer $fltr_id
 *
 * @property Fltrs $fltr
 * @property Products $product
 */
class ProductFltr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_fltrs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'fltr_id'], 'required'],
            [['product_id', 'fltr_id'], 'integer'],
            [['fltr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fltr::className(), 'targetAttribute' => ['fltr_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'fltr_id' => 'Fltr ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFltr()
    {
        return $this->hasOne(Fltrs::className(), ['id' => 'fltr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
