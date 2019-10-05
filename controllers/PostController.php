<?php

namespace app\controllers;

class PostController extends \yii\web\Controller {

    public $layout = '_main';

    public function actionIndex() {
        $categories = \app\models\PostCategory::find()->orderBy('no ASC')->all();
        $posts = \app\models\Post::find()->where(['deactivated' => FALSE])->orderBy('id DESC')->all();
        return $this->render('index', compact('categories', 'posts'));
    }

    public function actionView($id) {
        $post = \app\models\Post::findOne($id);
        return $this->render('view', compact('post'));
    }
}
