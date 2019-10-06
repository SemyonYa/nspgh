<?php

namespace app\controllers;

class PostController extends \yii\web\Controller
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

    public $layout = '_main';

    public function actionIndex()
    {
        $categories = \app\models\PostCategory::find()->orderBy('no ASC')->all();
        $posts = \app\models\Post::find()->where(['deactivated' => FALSE])->orderBy('id DESC')->all();
        return $this->render('index', compact('categories', 'posts'));
    }

    public function actionView($id)
    {
        $post = \app\models\Post::findOne($id);
        return $this->render('view', compact('post'));
    }
}
