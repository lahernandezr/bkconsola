<?php

namespace app\business;

use app\utils\DateUtils;
use app\models\Promotion;
use app\models\UserPromotion;

class CuponBusiness
{
    
    public function isValidByRequest($ID, $json = false){
        $b64 = base64_decode($ID);
        $result = json_decode($b64, false);

        $jsonResponse = array("result" => "ERROR", "message"=>"Error");

        $modelPromo = Promotion::find()->where(['ID' => $result->cupon])->one();
        if($modelPromo == null){
            $jsonResponse["message"]="Cúpon no es valido";
            return json_encode($jsonResponse);
        }
        if(!$modelPromo->ACTIVE){
            $jsonResponse["message"]="Cúpon no esta activo";
            return json_encode($jsonResponse);
        }

        $dateUtils = new DateUtils();

        if($modelPromo->INIT == null || $modelPromo->END == null){
            $jsonResponse["message"]="Cúpon no cuenta con fechas asignadas";
            return json_encode($jsonResponse);
        }
        $strCurrentDate = date('Y-m-d h:i:s');
        if(!$dateUtils->check_in_range($modelPromo->INIT,$modelPromo->END,$strCurrentDate)){
            $jsonResponse["message"]="Cúpon esta fuera del rango de fechas de redención";
            return json_encode($jsonResponse);
        }

        if($modelPromo->REDIMM != null && $modelPromo->REDIMM > $modelPromo->LIMIT_EXCHANGE){
            $jsonResponse["message"]="Cúpon se ha agotado";
            return json_encode($jsonResponse);
        }
        $jsonResponse["result"]="OK";
        $jsonResponse["message"]="Cupón es valido";
        return $json ? json_encode($jsonResponse):$jsonResponse;
    }


    public function convertDataQrToRequest($request){
        $b64 = base64_decode($request);
        return  json_decode($b64, false);        
    }

    public function redeem($cupon,$customer,$user){
        $modelPromo = Promotion::find()->where(['ID' => $cupon])->one();
        $modelPromo->REDIMM = (is_null($modelPromo->REDIMM)?0:$modelPromo->REDIMM) + 1;
        if($modelPromo->save()){
            $promo = new UserPromotion();
            $promo->ID_CUSTOMER = $customer;
            $promo->ID_USER = $user;
            $promo->ID_PROMOCION = $cupon;
            $promo->ID_SALE = 0;

            if($promo->save()) {
                return $promo;
            }
        }
        return null;
    }

}

?>