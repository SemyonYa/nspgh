<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_eng
 * @property string $brief_description
 * @property string $full_description
 * @property integer $category_id
 * @property integer $price
 * @property integer $img_id
 * @property string $galery_ids
 *
 * @property Categories $category
 */
class Product extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'category_id', 'price'], 'required'],
            [['art', 'quantity', 'brief_description', 'full_description', 'how_use', 'composition', 'contraindications', 'storage', 'video'], 'string'],
            [['category_id', 'img_id', 'galery_1', 'galery_2', 'galery_3'], 'integer'],
            [['price', 'price_without_discount'], 'double'],
            ['is_promo', 'boolean'],
            [['name', 'name_eng'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'art' => 'Артикул',
            'name' => 'Наименование',
            'name_eng' => 'Оринильное наименование',
            'brief_description' => 'Краткое описание',
            'full_description' => 'Полное описание',
            'how_use' => 'Применение',
            'composition' => 'Состав',
            'contraindications' => 'Противопоказания',
            'storage' => 'Условия хранения',
            'category_id' => 'Категория',
            'price' => 'Цена',
            'price_without_discount' => 'Цена без скидки (если есть)',
            'quantity' => 'Количество в упаковке',
            'img_id' => 'Основное изображение',
            'galery_1' => 'Изображение галереи',
            'galery_2' => 'Изображение галереи',
            'galery_3' => 'Изображение галереи',
            'video' => 'Видео',
            'is_promo' => '!Акция'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getFltrs() {
        return $this->hasMany(Fltr::className(), ['id' => 'fltr_id'])
                        ->viaTable('product_fltrs', ['product_id' => 'id']);
    }
    public function getProductsReco() {
        return $this->hasMany(ProductReco::className(), ['product_id' => 'id']);
    }
    public function getReco() {
        return $this->hasMany(Product::className(), ['id' => 'reco_id'])
                        ->viaTable('product_reco', ['product_id' => 'id']);
    }

    public function getComments() {
        return $this->hasMany(Comment::className(), ['product_id' => 'id']);
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
