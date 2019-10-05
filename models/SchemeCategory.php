<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scheme_categories".
 *
 * @property integer $id
 * @property string $name
 * @property integer $ordering
 *
 * @property Schemes[] $schemes
 */
class SchemeCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scheme_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['ordering'], 'integer'],
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
            'ordering' => 'Ordering',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemes()
    {
        return $this->hasMany(Schemes::className(), ['scheme_category_id' => 'id']);
    }
}
