<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scheme_products".
 *
 * @property integer $id
 * @property integer $scheme_id
 * @property integer $product_id
 *
 * @property Products $product
 * @property Schemes $scheme
 */
class SchemeProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scheme_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['scheme_id', 'product_id'], 'required'],
            [['scheme_id', 'product_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['scheme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scheme::className(), 'targetAttribute' => ['scheme_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'scheme_id' => '',
            'product_id' => 'Продукт',
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
    public function getScheme()
    {
        return $this->hasOne(Scheme::className(), ['id' => 'scheme_id']);
    }
}
