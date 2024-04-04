<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property int $ID
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $EMAIL
 * @property string $FULLNAME
 * @property string $PHONE
 * @property string $WHATSAPP
 * @property int $COUNTRY
 * @property string $BIRTHDATE
 * @property string $ID_GENDER
 * @property string $TYPE_REGISTRATION
 * @property string $ID_REGISTRATION
 * @property string $CREATED_AT
 * @property bool $IS_OTP
 * @property bool $ACTIVE
 */
class Customer extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USERNAME', 'EMAIL', 'FULLNAME', 'PHONE', 'ID_COUNTRY', 'BIRTHDATE', 'ID_GENDER', 'TYPE_REGISTRATION'], 'required'],
            [['CREATED_AT'], 'safe'],
            [['IS_OTP', 'ACTIVE'], 'boolean'],
            [['USERNAME', 'EMAIL', 'FULLNAME', 'ID_REGISTRATION'], 'string', 'max' => 255],
            [['PASSWORD'], 'string', 'max' => 500],
            [['PHONE', 'WHATSAPP', 'TYPE_REGISTRATION'], 'string', 'max' => 20],
            [['BIRTHDATE'], 'string', 'max' => 10],
            [['ID_GENDER'], 'string', 'max' => 2],
            [['ID_COUNTRY'], 'string', 'max' => 3],
            [['USERNAME'], 'unique'],
            [['EMAIL'], 'unique'],
            [['USERNAME'], 'match', 'pattern' => '/^[\*a-zA-Z0-9]{6,14}$/', 'message' => 'Minimo 6, maximo 14 caracteres letras y/o numeros.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USERNAME' => 'Usuario',
            'PASSWORD' => 'Contraseña',
            'EMAIL' => 'Email',
            'FULLNAME' => 'Nombre Completo',
            'PHONE' => 'Telefono',
            'WHATSAPP' => 'Whatsapp',
            'ID_COUNTRY' => 'Pais',
            'BIRTHDATE' => 'Cumpleaños',
            'ID_GENDER' => 'Genero',
            'TYPE_REGISTRATION' => 'Canal de Registro',
            'ID_REGISTRATION' => 'Identificador Registro',
            'CREATED_AT' => 'Fecha de Registro',
            'IS_OTP' => 'Otp',
            'ACTIVE' => 'Activo',
        ];
    }

    public function getGender()
    {
        return $this->hasOne(Gender::class, ['ID' => 'ID_GENDER']); 
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['ID' => 'ID_COUNTRY']); 
    }


    public function getWhatsAppLink(){
        return '<a target="_blank" href="https://wa.me/' . $this->WHATSAPP . '"  >' . $this->WHATSAPP . "</a>";
    }
}
