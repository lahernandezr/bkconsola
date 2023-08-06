<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%item}}".
 *
 * @property int $ID
 * @property string $NAME
 * @property string $DESCRIPCION
 * @property string $BARCODE
 * @property int $ID_CATEGORY
 * @property float $PRICE_COST
 * @property float $PRICE_SELL
 * @property string $IMAGE
 * @property int $ID_TAX
 * @property bool $ON_SALE
 * @property string|null $INIT
 * @property string|null $END
* @property string $ID_TYPE_ITEM
 * @property bool $ACTIVE
 */
class Item extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'BARCODE', 'ID_CATEGORY', 'PRICE_COST', 'PRICE_SELL', 'ID_TAX', 'ID_TYPE_ITEM'], 'required'],
            [['DESCRIPCION', 'IMAGE'], 'string'],
            [['ID_CATEGORY', 'ID_TAX','ID_PARENT'], 'integer'],
            [['PRICE_COST', 'PRICE_SELL', 'MARGIN', 'PRICE_TAX'], 'number'],
            [['ON_SALE', 'ACTIVE', 'IS_SHOW'], 'boolean'],
            [['INIT', 'END'], 'safe'],
            [['NAME', 'BARCODE'], 'string', 'max' => 255],
            [['BARCODE'], 'unique'],
            [['file'], 'file', 'extensions' => 'jpg, png, jpeg', 'maxFiles' => '1'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAME' => 'Name',
            'ID_PARENT' => 'Parent',
            'DESCRIPCION' => 'Description',
            'BARCODE' => 'Barcode/Sku',
            'ID_CATEGORY' => 'Category',
            'PRICE_COST' => 'Price Cost',
            'PRICE_SELL' => 'Price Sell',
            'IMAGE' => 'Image',
            'ID_TAX' => 'Tax',
            'MARGIN' => 'Margin %',
            'PRICE_TAX' => 'Price Tax',
            'ON_SALE' => 'On Sale',
            'INIT' => 'Init',
            'END' => 'End',
            'ID_TYPE_ITEM' => 'Type Item',
            'IS_SHOW' => 'Show',
            'ACTIVE' => 'Active'
            
        ];
    }
    
    public function getRate() {
        $tax = $this->hasOne(Tax::class, ['ID' => 'ID_TAX'])->one();
        if ($tax) {
            return $tax->PERCENT;
        } else {
            return 0.0;
        }
    }

    public function getTax()
    {
        return $this->hasOne(Tax::class, ['ID' => 'ID_TAX']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['ID' => 'ID_CATEGORY']);
    }

    public function hasModifiers(){
        return static::find()->where(['=', 'ID_PARENT', $this->ID])->andWhere('ID_PARENT <> ID')->count();
    }

    public function searchBarcodeAction(){

    }

}
