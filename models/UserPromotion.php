<?php

namespace app\models;

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
class UserPromotion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_promotion}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_USER', 'ID_SALE', 'ID_PROMOCION', 'ID_CUSTOMER'], 'required'],
            [['ID_USER', 'ID_SALE', 'ID_PROMOCION'], 'integer'],
            [['CREATED_AT'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_USER' => 'Usuario',
            'ID_SALE' => 'Numero de Venta',
            'ID_PROMOCION' => 'Cupon',
            'ID_CUSTOMER' => 'Cliente',
            'CREATED_AT' => 'Fecha de Redencion',
            'customer' => 'Cliente',
            'user' => 'Usuario',
            'promotion' => 'Cupón',

        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['ID' => 'ID_CUSTOMER']); 
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['ID' => 'ID_USER']); 
    }

    public function getPromotion()
    {
        return $this->hasOne(Promotion::class, ['ID' => 'ID_PROMOCION']);
    }
}
