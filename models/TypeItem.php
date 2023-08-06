<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%type_item}}".
 *
 * @property string $ID
 * @property string $NAME
 */
class TypeItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%type_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'NAME'], 'required'],
            [['ID'], 'string', 'max' => 1],
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
        ];
    }
}
