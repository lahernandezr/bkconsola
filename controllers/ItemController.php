<?php

namespace app\controllers;

use app\models\Category;
use app\models\Item;
use app\models\ItemModifier;
use app\models\ItemSearch;
use app\models\Tax;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\bootstrap4\ActiveForm;
use yii\web\Response;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
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
     * Lists all Item models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
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
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Item();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        } 
        if ($this->request->isPost && $model->load($this->request->post())){
            if(!$model->ON_SALE){
                $model->INIT = null;
                $model->END = null;
            }            
            $image = \yii\web\UploadedFile::getInstance($model, 'file');
            if(!is_null($image)) {
                $name = explode('.', $image->name);
                $ext = end($name);
                $model->IMAGE = Yii::$app->security->generateRandomString() . ".".$ext;
                $resource = Yii::$app->basePath . '/web/uploads/items/';
                $path = $resource . $model->IMAGE;
                if($image->saveAs($path)){                                
                    if( $model->save()) {
                        if($model->ID_TYPE_ITEM == 'P' && $model->ID_PARENT == null){                            
                            $model->ID_PARENT = $model->ID;
                            $model->save();
                        }
                        return $this->redirect(['view', 'ID' => $model->ID]);
                    }
                }
            }else{
                if($model->save()) {
                    if($model->ID_TYPE_ITEM == 'P' && $model->ID_PARENT == null){                            
                        $model->ID_PARENT = $model->ID;
                        $model->save();
                    }
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
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreateModifier()
    {
        $model = new ItemModifier();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        } 
        if ($this->request->isPost && $model->load($this->request->post())){
            if(!$model->ON_SALE){
                $model->INIT = null;
                $model->END = null;
            }            
            $image = \yii\web\UploadedFile::getInstance($model, 'file');
            if(!is_null($image)) {
                $name = explode('.', $image->name);
                $ext = end($name);
                $model->IMAGE = Yii::$app->security->generateRandomString() . ".".$ext;
                $resource = Yii::$app->basePath . '/web/uploads/items/';
                $path = $resource . $model->IMAGE;
                if($image->saveAs($path)){                                
                    if( $model->save()) {                        
                        return $this->redirect(['view', 'ID' => $model->ID]);                      
                    }
                }
            }else{
                if($model->save()) {
                    $modelParent = $this->findModel($model->ID_PARENT);
                    return $this->redirect(['view', 'ID' => $model->ID]);                                            
                }                
            }          
        } else {
            $model->loadDefaultValues();
        }
        /*
        return $this->render('create', [
            'model' => $model,
        ]);
        */
        $modelParent = $this->findModel($model->ID_PARENT);
        return $this->render('create', [           
            'model' =>   $modelParent
        ]);          
    }
    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);


        if ($this->request->isPost && $model->load($this->request->post())){
            if(!$model->ON_SALE){
                $model->INIT = null;
                $model->END = null;
            }
            $image = \yii\web\UploadedFile::getInstance($model, 'file');
            if(!is_null($image)) {
                $name = explode('.', $image->name);
                $ext = end($name);
                $model->IMAGE = Yii::$app->security->generateRandomString() . ".$ext";
                $resource = Yii::$app->basePath . '/web/uploads/items/';
                $path = $resource . $model->IMAGE;
                if($image->saveAs($path)) {
                    if($model->save()) {
                        return $this->redirect(['view', 'ID' => $model->ID]);
                    }
                }
            }else{
                if($model->save()) {
                    return $this->redirect(['view', 'ID' => $model->ID]);
                }            
            }          
        }
        //var_dump($model);
        //var_dump($model_modifier);
        //exit();
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Item model.
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
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Item::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionCatid($ID)
    {
        $taxCategory = Category::find()
            ->where(['ID' => $ID])
            ->one();

            $tax = Tax::find()
            ->where(['ID' => $taxCategory->ID_TAX])
            ->one();

        echo $tax->ID .','. ($tax == null ? "0.0":$tax->PERCENT);

    }

    public function actionTaxid($ID)
    {
        if($ID == "" || $ID == null)
            return "0,0";
            $tax = Tax::find()
            ->where(['ID' =>  $ID])
            ->one();

        echo $tax->ID .','. ($tax == null ? "0.0":$tax->PERCENT);

    }

    public function actionValidateBarcode(){
        // validate for ajax request
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $item = new Item();
            $post = Yii::$app->request->post();
            $item->load($post);

            return ActiveForm::validate($item);
        }          
    }

}
