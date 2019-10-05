<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $is_disabled
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'path'], 'required'],
            [['name', 'path'], 'string'],
            [['is_disabled'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'path' => 'Ссылка из YouTube',
            'is_disabled' => 'Отключить',
        ];
    }
}
