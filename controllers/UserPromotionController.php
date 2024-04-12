<?php

namespace app\controllers;

use yii\web\Controller;
use app\utils\DateUtils;
use app\models\Promotion;
use app\models\PromoRedeem;
use yii\filters\VerbFilter;
use app\models\UserPromotion;
use app\business\CuponBusiness;
use app\business\CuponValidator;
use yii\web\NotFoundHttpException;
use app\models\UserPromotionSearch;

/**
 * UserPromotionController implements the CRUD actions for UserPromotion model.
 */
class UserPromotionController extends Controller
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
     * Lists all UserPromotion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserPromotionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserPromotion model.
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

    public function actionTicket($ID)
    {
        return $this->render('ticket', [
            'model' => $this->findModel($ID),
        ]);
    }


    /**
     * Creates a new UserPromotion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserPromotion();

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

    public function actionRedeem()
    {
        $model = new PromoRedeem();

        return $this->render('redeem', [
            'model' => $model,
        ]);
    }

    public function actionRedeemComplete()
    {
        $model = new PromoRedeem();

        if ($this->request->isPost && $model->load($this->request->post())) {

            $cuponValidator = new CuponBusiness();
            // PBCLMWWOMABT1J20242104120739 ID 1

            // {"cupon" : 2, "id": 1}
            // eyJjdXBvbiIgOiAyLCAiaWQiOiAxfQ==
            $resultRequest = $cuponValidator->convertDataQrToRequest($model->qrcode);
            $redemtion = $cuponValidator->redeem($resultRequest->cupon,$resultRequest->id,2);
            if($redemtion !=null){

                return $this->render('view', [
                    'model' => $this->findModel($redemtion->ID),
                ]);
            }

            return $this->render('redeem', [
                'model' => $model,
            ]);
       
        }

        // return $this->render('redeem', [
        //     'model' => $model,
        // ]);
    }

    public function actionRedeemValidator($ID)
    {
        $cuponValidator = new CuponBusiness();
        return $cuponValidator->isValidByRequest($ID,true);
    }




    /**
     * Updates an existing UserPromotion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
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
     * Deletes an existing UserPromotion model.
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
     * Finds the UserPromotion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return UserPromotion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = UserPromotion::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

  
}



