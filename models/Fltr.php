<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fltrs".
 *
 * @property integer $id
 * @property string $name
 * @property integer $description
 * @property integer $fltr_id
 * @property integer $is_title
 *
 * @property Fltr $fltr
 * @property Fltr[] $fltrs
 * @property ProductFltr[] $productFltrs
 */
class Fltr extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'fltrs';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'description'], 'required'],
            [['fltr_id'], 'integer'],
            ['is_title', 'boolean'],
            [['name'], 'string', 'max' => 100],
            [['fltr_id'], 'exist', 'skipOnError' => false, 'targetClass' => Fltr::className(), 'targetAttribute' => ['fltr_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => false, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
            'fltr_id' => 'Родитель',
            'is_title' => 'Родительский',
            'category_id' => 'Категория'
        ];
    }

    public function getParent() {
        return $this->hasOne(Fltr::className(), ['id' => 'fltr_id']);
    }

    public function getChildren() {
        return $this->hasMany(Fltr::className(), ['fltr_id' => 'id']);
    }

//    public function getProductFltrs() {
//        return $this->hasMany(ProductFltr::className(), ['fltr_id' => 'id']);
//    }

    public function getProducts() {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
            ->viaTable('product_fltrs', ['fltr_id' => 'id']);
    }

}
