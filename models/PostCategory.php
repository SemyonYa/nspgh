<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_categories".
 *
 * @property integer $id
 * @property string $name
 * @property integer $no
 *
 * @property Posts[] $posts
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'no'], 'required'],
            [['no'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'no' => 'No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['category_id' => 'id']);
    }
}
