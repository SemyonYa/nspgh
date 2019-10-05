<?php

namespace app\modules\admin\models;
class FltrProducts extends \yii\base\Model {
    public $name;
    public $checked_list;
    public $filter_id;
    
    public function rules() {
        return [
            ['name', 'string'],
            [['checked_list', 'filter_id'], 'safe'],
        ];
    }


    public function attributeLabels() {
        return [
            
        ];
    }
}
