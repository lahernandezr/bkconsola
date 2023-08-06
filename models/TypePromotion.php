<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%type_promotion}}".
 *
 * @property string $ID
 * @property string $NAME
 */
class TypePromotion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%type_promotion}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'NAME'], 'required'],
            [['ID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 100],
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
        ];
    }
}
