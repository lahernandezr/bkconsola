<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%gender}}".
 *
 * @property int $ID
 * @property string $NAME
 */
class Gender extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%gender}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['NAME'], 'string', 'max' => 2],
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
