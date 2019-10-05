<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Scheme;
use app\models\SchemeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchemeController implements the CRUD actions for Scheme model.
 */
class SchemeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Scheme models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchemeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Scheme model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $sp_model = new \app\models\SchemeProduct();
        $sp_model->scheme_id = $id;
        $model = $this->findModel($id);
        if ($sp_model->load(\Yii::$app->request->post())) {
            if ($sp_model->validate()) {
                if ($sp_model->save()) {
                    $this->redirect('/admin/scheme/view?id='.$id);
                }
            }
        }
        return $this->render('view', compact('model', 'sp_model'));
    }

    /**
     * Creates a new Scheme model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Scheme();
        $sc_model = new \app\models\SchemeCategory();
        if ($sc_model->load(Yii::$app->request->post()) && $sc_model->save()) {
            return $this->refresh();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', compact('model', 'sc_model'));
        }
    }

    /**
     * Updates an existing Scheme model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $sc_model = new \app\models\SchemeCategory();
        if ($sc_model->load(Yii::$app->request->post()) && $sc_model->save()) {
            return $this->refresh();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', compact('model', 'sc_model'));
        }
    }

    /**
     * Deletes an existing Scheme model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Scheme model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Scheme the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Scheme::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionRemoveSchemeProduct($id) {
        $sp = \app\models\SchemeProduct::findOne($id);
        $sp->delete();
    }
}
