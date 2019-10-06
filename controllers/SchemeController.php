<?php

namespace app\controllers;

class SchemeController extends \yii\web\Controller
{
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $session = \Yii::$app->session;
        if ($session->get('products') === null)
            $session->set('products', []);
        if ($session->get('sets') === null)
            $session->set('sets', []);
    }

    public function actionIndex()
    {
        $scheme_categories = \app\models\SchemeCategory::find()->all();
        return $this->render('index', compact('schemes', 'scheme_categories'));
    }

    public function actionList($id)
    {
        $scheme_category = \app\models\SchemeCategory::findOne($id);
        $schemes = \app\models\Scheme::findAll(['scheme_category_id' => $id]);
        return $this->render('list', compact('schemes', 'scheme_category'));
    }

    public function actionView($id)
    {
        $model = \app\models\Scheme::findOne($id);
        return $this->render('view', compact('model'));
    }

}
