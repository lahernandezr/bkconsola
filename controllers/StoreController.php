<?php

namespace app\controllers;

use app\models\Store;
use app\models\StoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * StoreController implements the CRUD actions for Store model.
 */
class StoreController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Store models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StoreSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Store model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID),
        ]);
    }

    /**
     * Creates a new Store model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Store();

        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {
        //         return $this->redirect(['view', 'ID' => $model->ID]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = \yii\web\UploadedFile::getInstance($model, 'file');
            if(!is_null($image)) {
                $name = explode('.', $image->name);
                $ext = end($name);
                $model->IMAGE = Yii::$app->security->generateRandomString() . ".$ext";
                $resource = Yii::$app->basePath . '/web/uploads/stores/';
                $path = $resource . $model->IMAGE;
                if($image->saveAs($path)){
                    if($model->save()) {
                        return $this->redirect(['view', 'ID' => $model->ID]);
                    }
                } 
            } else {
                if($model->save()) {
                    return $this->redirect(['view', 'ID' => $model->ID]);
                } 
            }   
            
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Store model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);

        // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'ID' => $model->ID]);
        // }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = \yii\web\UploadedFile::getInstance($model, 'file');
                if(!is_null($image)) {
                    $name = explode('.', $image->name);
                    $ext = end($name);
                    $model->IMAGE = Yii::$app->security->generateRandomString() . ".$ext";
                    $resource = Yii::$app->basePath . '/web/uploads/stores/';
                    $path = $resource . $model->IMAGE;
                    if($image->saveAs($path)){
                        if($model->save()) {
                            return $this->redirect(['view', 'ID' => $model->ID]);
                        }
                    }

                } else {
                    if($model->save()) {
                        return $this->redirect(['view', 'ID' => $model->ID]);
                    } 
                }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Store model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Store model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Store the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Store::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
