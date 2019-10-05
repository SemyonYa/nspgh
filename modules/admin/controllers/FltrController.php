<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Fltr;
use app\modules\admin\models\FltrProducts;
use app\models\ProductFltr;
use app\models\Product;
//use app\models\FltrSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FltrController implements the CRUD actions for Fltr model.
 */
class FltrController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $filters = Fltr::findAll(['is_title' => TRUE]);
        
        return $this->render('index', compact('filters'));
    }

    /**
     * Displays a single Fltr model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $filter = $this->findModel($id);
        if (!$filter->is_title) {
            $parent = $filter->parent;
//            $products = Product::findAll(['category_id' => $parent->category_id])->orderBy('name');
            $products = Product::find()->where(['category_id' => $parent->category_id])->orderBy('name')->all();
        } else {
            $products = [];
        }
        $model = new FltrProducts();
        $model->name = $filter->name;
        $model->filter_id = $id;
        $filter_products = ProductFltr::findAll(['fltr_id' => $id]);
        $checked_filter_products = [];
        foreach ($filter_products as $fp) {
            $checked_filter_products[] = $fp->product_id;
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
//                var_dump($model->checked_list);die;
                ProductFltr::deleteAll(['fltr_id' => $id]);
                if ($model->checked_list) {
                    foreach ($model->checked_list as $p_id) {
                        $p_f_model = new ProductFltr();
                        $p_f_model->product_id = $p_id;
                        $p_f_model->fltr_id = $model->filter_id;
                        $p_f_model->save();
                    }
                }
                
                return $this->redirect('/admin/fltr/index');
            }
        }
        return $this->render('view', compact('model', 'products', 'checked_filter_products'));
    }

    /**
     * Creates a new Fltr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Fltr();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Fltr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Fltr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fltr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fltr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Fltr::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
