<?php

namespace app\models;

//use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class OrderModal extends Model
{
    public $fio;
    public $email;
    public $phone;
    public $good;
    public $address;
    public $quantity;
    public $good_id;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['fio', 'email', 'phone'], 'required'],
            ['email', 'email'],
            [['quantity', 'good_id'], 'integer'],
            [['address', 'good'], 'trim'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'fio' => 'Как к Вам обращаться', 
            'email' => 'Ваш E-mail', 
            'phone' => 'Телефон', 
            'good' => 'Товар',
            'quantity' => 'Количество',
            'address' => 'Адрес',
            'good_id' => '',
        ];
    }
}
