<?php

namespace app\controllers;

class SchemeController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        $schemes = \app\models\Scheme::find()->all();
        $scheme_categories = \app\models\SchemeCategory::find()->all();
        return $this->render('index', compact('schemes', 'scheme_categories'));
    }
    public function actionList($id) {
        $scheme_category = \app\models\SchemeCategory::findOne($id);
        $schemes = \app\models\Scheme::findAll(['scheme_category_id' => $id]);
        return $this->render('list', compact('schemes', 'scheme_category'));
    }
    public function actionView($id) {
        $model = \app\models\Scheme::findOne($id);
        return $this->render('view', compact('model'));
    }

}
