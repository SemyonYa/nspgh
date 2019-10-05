<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $date
 * @property integer $is_active
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category_id', 'date'], 'required'],
            [['description', 'text'], 'string'],
            [['img_id', 'category_id'], 'integer'],
            [['date'], 'safe'],
            [['deactivated'], 'boolean'],
            [['title'], 'string', 'max' => 250],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок статьи',
            'description' => 'Краткое описание',
            'text' => 'Текст',
            'category_id' => 'Категория',
            'img_id' => 'Изображение (отображается в списке)',
            'date' => 'Дата размещения',
            'deactivated' => 'Отключить',
        ];
    }
}
