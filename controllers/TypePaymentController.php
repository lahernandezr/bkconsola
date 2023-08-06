<?php

namespace app\controllers;

use app\models\TypePayment;
use app\models\TypePaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TypePaymentController implements the CRUD actions for TypePayment model.
 */
class TypePaymentController extends Controller
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
     * Lists all TypePayment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TypePaymentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TypePayment model.
     * @param string $ID ID
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
     * Creates a new TypePayment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TypePayment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID' => $model->ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TypePayment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TypePayment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TypePayment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ID ID
     * @return TypePayment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = TypePayment::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
