<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_reco".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $reco_id
 *
 * @property Products $product
 * @property Products $reco
 */
class ProductReco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_reco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'reco_id'], 'required'],
            [['product_id', 'reco_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['reco_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['reco_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'reco_id' => 'Рекомендуемый продукт',
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
    public function getReco()
    {
        return $this->hasOne(Product::className(), ['id' => 'reco_id']);
    }
}
