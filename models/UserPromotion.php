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
            [['ID_USER', 'ID_SALE', 'ID_PROMOCION', 'CREATED_AT'], 'required'],
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
            'ID_USER' => 'Id User',
            'ID_SALE' => 'Id Sale',
            'ID_PROMOCION' => 'Id Promocion',
            'CREATED_AT' => 'Created At',
        ];
    }
}
