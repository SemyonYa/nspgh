<?php

namespace app\models;

//use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $hidden
 * @property integer $product_id
 */
class NewComment extends \yii\base\Model {

    public $title;
    public $description;
    public $name;
    public $verifyCode;

    public function rules() {
        return [
            [['title', 'description', 'name'], 'required'],
            [['title', 'description', 'name'], 'string'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'title' => 'Заголовок',
            'description' => 'Текст',
            'name' => 'Ваше имя',
            'verifyCode' => 'Я не робот',
        ];
    }

}
