<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sets".
 *
 * @property integer $id
 * @property integer $art
 * @property string $name
 * @property string $brief_description
 * @property string $full_description
 * @property double $price
 * @property double $price_without_discount
 * @property integer $img_id
 * @property integer $is_promo
 * @property integer $galery_1
 * @property integer $galery_2
 * @property integer $galery_3
 *
 * @property SetProducts[] $setProducts
 */
class Set extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'sets';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['art', 'name', 'brief_description', 'price', 'img_id'], 'required'],
            [['art', 'img_id', 'is_promo', 'galery_1', 'galery_2', 'galery_3'], 'integer'],
            [['brief_description', 'full_description', 'how_use', 'video'], 'string'],
            [['price', 'price_without_discount'], 'double'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'art' => 'Артикул',
            'name' => 'Наименование набора',
            'brief_description' => 'Краткое описание',
            'full_description' => 'Полное описание',
            'how_use' => 'Применение',
            'price' => 'Цена',
            'price_without_discount' => 'Цена без скидки',
            'img_id' => 'Основное изображение',
            'is_promo' => 'Акция',
            'galery_1' => 'Картинка галереи 1',
            'galery_2' => 'Картинка галереи 2',
            'galery_3' => 'Картинка галереи 3',
            'video' => 'Видео'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSetProducts() {
        return $this->hasMany(SetProduct::className(), ['set_id' => 'id']);
    }

    public function getProducts() {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
                        ->viaTable('set_products', ['set_id' => 'id']);
    }

    public static function Currency() {
        $currency = Currency::find()->orderBy('date DESC')->one();
        return $currency;
    }

    public function CurrencyPrice() {
        return round($this->price * $this->Currency()->value, 2);
    }

    public function CurrencyPriceWithoutDiscount() {
        return round($this->price_without_discount * $this->Currency()->value, 2);
    }

}
