<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;

class QrmenuController extends Controller
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
                ],
            ]
        );
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionQrcode()
    {
        return $this->render('qrcode');
    }

}
