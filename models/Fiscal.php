<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%fiscal}}".
 *
 * @property int $ID
 * @property string $TYPE
 * @property string $AUTH_RESOLUTION
 * @property string $AUTH_DATE
 * @property string $SERIE
 * @property int $INIT
 * @property int $END
 * @property int $CURRENT
 * @property string $CREATED_AT
 * @property bool $ACTIVE
 */
class Fiscal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%fiscal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TYPE', 'AUTH_RESOLUTION', 'AUTH_DATE', 'SERIE', 'INIT', 'END', 'CURRENT'], 'required'],
            [['TYPE'], 'string'],
            [['INIT', 'END', 'CURRENT'], 'integer'],
            [['CREATED_AT'], 'safe'],
            [['ACTIVE'], 'boolean'],
            [['AUTH_RESOLUTION', 'SERIE'], 'string', 'max' => 50],
            [['AUTH_DATE'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TYPE' => 'Type',
            'AUTH_RESOLUTION' => 'Auth Resolution',
            'AUTH_DATE' => 'Auth Date',
            'SERIE' => 'Serie',
            'INIT' => 'Init',
            'END' => 'End',
            'CURRENT' => 'Current',
            'CREATED_AT' => 'Created At',
            'ACTIVE' => 'Active',
        ];
    }
}
