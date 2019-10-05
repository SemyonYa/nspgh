<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property string $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body', 'date'], 'required'],
            [['body'], 'string'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['img_id'], 'integer']
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
            'body' => 'Текст нвости',
            'img_id' => 'Изображение (отображается в ленте новостей)',
            'date' => 'Дата публикации',
        ];
    }
}
