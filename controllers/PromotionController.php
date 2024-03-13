<?php

namespace app\controllers;

use app\models\Item;
use app\models\Promotion;
use app\models\PromotionSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * PromotionController implements the CRUD actions for Promotion model.
 */
class PromotionController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Promotion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PromotionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Promotion model.
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
     * Creates a new Promotion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Promotion();

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
                $resource = Yii::$app->basePath . '/web/uploads/promos/';
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
     * Updates an existing Promotion model.
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
                $resource = Yii::$app->basePath . '/web/uploads/promos/';
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
     * Deletes an existing Promotion model.
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
     * Finds the Promotion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Promotion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Promotion::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionItemList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('ID AS id, NAME AS text')
                ->from('app_item')
                ->where(['like', 'NAME', $q])
                ->orWhere(['like', 'BARCODE', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Item::find($id)->name];
        }
        return $out;
    }
}
