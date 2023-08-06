<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sale_item}}".
 *
 * @property int $ID
 * @property int $ID_SALE
 * @property string $BARCODE
 * @property string $NAME
 * @property int $ID_CATEGORY
 * @property int $ID_ITEM
 * @property float $PRICE_COST
 * @property float $PRICE_SELL
 * @property float $QUANTITY
 * @property int $ID_TAX
 * @property float $TAXES
 * @property float $TOTAL
 */
class SaleItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sale_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_SALE', 'BARCODE', 'NAME', 'ID_CATEGORY', 'ID_ITEM', 'PRICE_COST', 'PRICE_SELL', 'QUANTITY', 'ID_TAX', 'TAXES', 'TOTAL'], 'required'],
            [['ID_SALE', 'ID_CATEGORY', 'ID_ITEM', 'ID_TAX'], 'integer'],
            [['PRICE_COST', 'PRICE_SELL', 'QUANTITY', 'TAXES', 'TOTAL'], 'number'],
            [['BARCODE'], 'string', 'max' => 50],
            [['NAME'], 'string', 'max' => 255],
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
            'BARCODE' => 'Barcode',
            'NAME' => 'Name',
            'ID_CATEGORY' => 'Id Category',
            'ID_ITEM' => 'Id Item',
            'PRICE_COST' => 'Price Cost',
            'PRICE_SELL' => 'Price Sell',
            'QUANTITY' => 'Quantity',
            'ID_TAX' => 'Id Tax',
            'TAXES' => 'Taxes',
            'TOTAL' => 'Total',
        ];
    }
}
