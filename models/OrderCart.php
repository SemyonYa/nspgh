<?php

namespace app\models;

//use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class OrderCart extends Model
{
    public $fio;
    public $email;
    public $phone;
    public $address;
    public $consent;
    public $member;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['fio', 'email', 'phone', 'consent'], 'required'],
            ['email', 'email'],
            [['address', 'member'], 'trim'],
            
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
            'address' => 'Адрес',
            'consent' => 'Согласие на обработку персональных данных',
            'member' => 'ID резидента',
        ];
    }
}
