<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_country".
 *
 * @property string $ID
 * @property string $NAME
 * @property string $ISO3
 * @property bool $ACTIVE
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'NAME', 'ISO3'], 'required'],
            [['ACTIVE'], 'boolean'],
            [['ID'], 'string', 'max' => 3],
            [['NAME'], 'string', 'max' => 30],
            [['ISO3'], 'string', 'max' => 3],
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
            'ISO3' => 'Iso3',
            'ACTIVE' => 'Active',
        ];
    }
}
