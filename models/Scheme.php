<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schemes".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $img_id
 * @property integer $deactivated
 *
 * @property SchemeProducts[] $schemeProducts
 */
class Scheme extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'schemes';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['img_id'], 'integer'],
            [['deactivated'], 'boolean'],
            [['name'], 'string', 'max' => 100],
            [['scheme_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchemeCategory::className(), 'targetAttribute' => ['scheme_category_id' => 'id']],
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
            'img_id' => 'Изображение',
            'deactivated' => 'Деактивировать',
            'scheme_category_id' => 'Категория'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemeProducts() {
        return $this->hasMany(SchemeProduct::className(), ['scheme_id' => 'id']);
    }

    public function getProducts() {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
                        ->viaTable('scheme_products', ['scheme_id' => 'id']);
    }

}
