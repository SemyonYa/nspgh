<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $hidden
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'uniqcode'], 'required'],
            [['name', 'description', 'uniqcode'], 'string'],
            [['hidden', 'is_club'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Заголовок',
            'description' => 'Содержание',
            'uniqcode' => 'уникальный идентификатор (латиница)',
            'hidden' => 'Скрыть',
            'is_club' => 'Добавить на страницу слайдер клуба'
        ];
    }
}
