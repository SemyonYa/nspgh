<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Set;
use app\models\SetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SetController implements the CRUD actions for Set model.
 */
class SetController extends Controller
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
     * Lists all Set models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Set model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $sp_model = new \app\models\SetProduct();
        $sp_model->quantity = 1;
        $sp_model->set_id = $id;
        $model = $this->findModel($id);
        if ($sp_model->load(\Yii::$app->request->post())) {
            if ($sp_model->validate()) {
                if ($sp_model->save()) {
                    $this->redirect('/admin/set/view?id='.$id);
                }
            }
        }
        return $this->render('view', compact('model', 'sp_model'));
    }

    /**
     * Creates a new Set model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Set();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Set model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Set model.
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
     * Finds the Set model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Set the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Set::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionRemoveSetProduct($id) {
        $sp = \app\models\SetProduct::findOne($id);
        $sp->delete();
    }
}
