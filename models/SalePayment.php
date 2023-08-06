<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sale_payment}}".
 *
 * @property int $ID
 * @property int $ID_SALE
 * @property string $TYPE_PAYMENT
 * @property string $NUMBER
 * @property float $AMOUNT
 * @property float $TOTAL
 */
class SalePayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sale_payment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_SALE', 'TYPE_PAYMENT', 'NUMBER', 'AMOUNT', 'TOTAL'], 'required'],
            [['ID_SALE'], 'integer'],
            [['AMOUNT', 'TOTAL'], 'number'],
            [['TYPE_PAYMENT'], 'string', 'max' => 10],
            [['NUMBER'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_SALE' => 'Id Sale',
            'TYPE_PAYMENT' => 'Type Payment',
            'NUMBER' => 'Number',
            'AMOUNT' => 'Amount',
            'TOTAL' => 'Total',
        ];
    }
}
