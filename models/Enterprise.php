<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_enterprise".
 *
 * @property int $ID
 * @property string $CODE
 * @property string $NAME
 * @property string $ADDRESS
 * @property string $NIT
 * @property string $RUT
 * @property string $EMAIL
 * @property string $CONTACT
 * @property string $PHONE
 * @property string $CREATED_AT
 * @property int $ACTIVE
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_enterprise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CODE', 'NAME', 'ADDRESS', 'NIT', 'RUT', 'EMAIL', 'CONTACT', 'PHONE'], 'required'],
            [['CREATED_AT'], 'safe'],
            [['ACTIVE'], 'boolean'],
            [['CODE'], 'string', 'max' => 10],
            [['NAME', 'EMAIL', 'CONTACT'], 'string', 'max' => 100],
            [['ADDRESS'], 'string', 'max' => 255],
            [['NIT', 'RUT', 'PHONE'], 'string', 'max' => 30],
            [['CODE'], 'unique'],
            [['CODE'], 'match', 'pattern' => '/^[\*a-zA-Z0-9]{6,10}$/', 'message' => 'Minimo 6, maximo 10 caracteres letras y/o numeros.'],
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
            'NAME' => 'Empresa',
            'ADDRESS' => 'Direccion',
            'NIT' => 'NIT',
            'RUT' => 'RUT',
            'EMAIL' => 'Email',
            'CONTACT' => 'Nombre de Contacto',
            'PHONE' => 'Telefono',
            'CREATED_AT' => 'Creado',
            'ACTIVE' => 'Activo',
        ];
    }
}
