<?php

namespace app\controllers;

class PageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionView() {
        $uri = \Yii::$app->request->getUrl();
        $uniqcode = substr($uri, 1);
        $model = \app\models\Page::findOne(['uniqcode' => $uniqcode]);
        if ($model->is_club) {
            $this->layout = '_club';
        }
        return $this->render('view', compact('model'));
    }
}
