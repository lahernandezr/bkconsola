<?php

namespace app\controllers;

use app\models\TypePromotion;
use app\models\TypePromotionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TypePromotionController implements the CRUD actions for TypePromotion model.
 */
class TypePromotionController extends Controller
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
     * Lists all TypePromotion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TypePromotionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TypePromotion model.
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
     * Creates a new TypePromotion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TypePromotion();

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
     * Updates an existing TypePromotion model.
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
     * Deletes an existing TypePromotion model.
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
     * Finds the TypePromotion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ID ID
     * @return TypePromotion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = TypePromotion::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
