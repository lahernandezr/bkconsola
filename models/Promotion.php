<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%promotion}}".
 *
 * @property int $ID
 * @property string $CODE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $ID_TYPE_PROMOTION
 * @property float $VALUE
 * @property string|null $TYPE_DISC
 * @property int $ID_ITEM
 * @property string|null $INIT
 * @property string|null $END
 * @property string $IMAGE
 * @property string $LINK
 * @property int $LIMIT_EXCHANGE
 * @property int $REDIMM
 * @property bool $ACTIVE
 */
class Promotion extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%promotion}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CODE', 'NAME', 'DESCRIPTION', 'ID_TYPE_PROMOTION'], 'required'],
            [['VALUE','S_INIT','S_END','REGULAR_PRICE','PROMO_PRICE'], 'number'],
            [['TYPE_DISC', 'IMAGE', 'LINK'], 'string'],
            [['ID_ITEM', 'LIMIT_EXCHANGE', 'REDIMM','LIMIT_PER_DAY','LIMIT_PER_CUSTOMER','LIMIT_PER_DAY_CUSTOMER'], 'integer'],
            [['INIT', 'END'], 'safe'],
            [['ACTIVE'], 'boolean'],
            [['CODE','SERIE'], 'string', 'max' => 50],
            [['NAME'], 'string', 'max' => 100],
            [['DESCRIPTION'], 'string', 'max' => 2000],
            [['ID_TYPE_PROMOTION'], 'string', 'max' => 2],
            [['CODE', 'ID_ITEM'], 'unique', 'targetAttribute' => ['CODE', 'ID_ITEM']],
            [['file'], 'file', 'extensions' => 'jpg, png, jpeg', 'maxFiles' => '1'],
            [['ID_TYPE_PROMOTION'], 'exist', 'skipOnError' => true, 'targetClass' => TypePromotion::class, 'targetAttribute' => ['ID_TYPE_PROMOTION' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CODE' => 'Código',
            'NAME' => 'Nombre',
            'DESCRIPTION' => 'Descripción',
            'ID_TYPE_PROMOTION' => 'Tipo Promoción',
            'VALUE' => 'Valor',
            'TYPE_DISC' => 'Tipo Descuento',
            'ID_ITEM' => 'Item',
            'INIT' => 'Valido desde',
            'END' => 'Valido hasta',
            'IMAGE' => 'Imagen',
            'LINK' => 'Enlace',
            'REGULAR_PRICE' => 'Precio Regular',
            'PROMO_PRICE' => 'Precio Promoción',
            'LIMIT_EXCHANGE' => 'Total de Cupones',
            'LIMIT_PER_DAY' => 'Limite Canje Promoción x Dia',
            'LIMIT_PER_CUSTOMER' => 'Limite Canje Cliente',
            'LIMIT_PER_DAY_CUSTOMER' => 'Limite Canje x Dia Cliente',
            'REDIMM' => 'Total en Existencias',
            'ID_ENTERPRISE' => 'Empresa',
            'SERIE' => 'Serie',
            'S_INIT' => 'Valor Inicial',
            'S_END' => 'Valor Final',            
            'ACTIVE' => 'Activo',
        ];
    }

    public function getTypePromotion()
    {
        return $this->hasOne(TypePromotion::class, ['ID' => 'ID_TYPE_PROMOTION']); 
    }

    public function getCalculateStock()
    {
        $totalRedeem = $this->REDIMM == null ? 0 : $this->REDIMM;
        $result = $this->LIMIT_EXCHANGE - $totalRedeem;
        return $result;
    }

}
