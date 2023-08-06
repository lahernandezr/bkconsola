<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%type_payment}}".
 *
 * @property string $ID
 * @property string $NAME
 * @property bool $ACTIVE
 */
class TypePayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%type_payment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'NAME'], 'required'],
            [['ACTIVE'], 'boolean'],
            [['ID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 255],
            [['ID'], 'unique'],
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
            'ACTIVE' => 'Active',
        ];
    }
}
