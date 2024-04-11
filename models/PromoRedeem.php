<?php

namespace app\models;

use yii\base\Model;

use Yii;

/**
 * This is the model class for table "{{%user_promotion}}".
 *
 * @property int $ID
 * @property int $ID_USER
 * @property int $ID_SALE
 * @property int $ID_PROMOCION
 * @property string $CREATED_AT
 */
class PromoRedeem extends Model
{
    public $qrcode;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qrcode'], 'required'],
            [['qrcode'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'qrcode' => 'Codigo QR'
        ];
    }
}