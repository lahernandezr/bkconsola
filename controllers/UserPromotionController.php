<?php

namespace app\controllers;

use app\models\PromoRedeem;
use app\models\UserPromotion;
use app\models\Promotion;
use app\models\UserPromotionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
                    'class' => VerbFilter::className(),
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

            // PBCLMWWOMABT1J20242104120739 ID 1

            // {"cupon" : 2, "id": 1}
            // eyJjdXBvbiIgOiAyLCAiaWQiOiAxfQ==
            $b64 = base64_decode($$model->qrcode);
            $result = json_decode($b64, false);

            $promo = new UserPromotion();

            $promo->ID_CUSTOMER = $result->id;
            $promo->ID_USER = 2;
            $promo->ID_PROMOCION = $result->cupon;
            $promo->ID_SALE = 0;

            if($promo->save()) {
                return $this->redirect(['index']);
            }
            

            var_dump($promo);

            
        }

        // return $this->render('redeem', [
        //     'model' => $model,
        // ]);
    }

    public function actionRedeemValidator($ID)
    {
        $b64 = base64_decode($ID);
        $result = json_decode($b64, false);

        $jsonResponse = array("result" => "ERROR", "message"=>"Error","vardump"=>"");

        $modelPromo = Promotion::find()->where(['CODE' => $result->cupon]);
        if($modelPromo == null){
            $jsonResponse["message"]="Cúpon no es valido";
            return json_encode($jsonResponse);
        }

        if(!$modelPromo->ACTIVE){
            $jsonResponse["message"]="Cúpon no esta activo";
            return json_encode($jsonResponse);
        }

        if($modelPromo->REDIMM != null && $modelPromo->REDIMM > $modelPromo->LIMIT_EXCHANGE){
            $jsonResponse["message"]="Cúpon se ha agotado";
            return json_encode($jsonResponse);
        }

        return json_encode($jsonResponse);

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



