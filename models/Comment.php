<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $hidden
 * @property integer $product_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'product_id', 'name'], 'required'],
            [['title', 'description', 'name'], 'string'],
            [['hidden', 'product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Текст',
            'name' => 'Имя',
            'hidden' => 'Скрыть',
            'product_id' => 'Product ID',
        ];
    }
}
