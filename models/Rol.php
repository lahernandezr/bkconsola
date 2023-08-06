<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%rol}}".
 *
 * @property int $ID
 * @property string $NAME
 * @property bool $ACTIVE
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rol}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'NAME'], 'required'],
            [['ID'], 'integer'],
            [['ACTIVE'], 'boolean'],
            [['NAME'], 'string', 'max' => 50],
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
