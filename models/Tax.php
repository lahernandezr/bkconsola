<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%taxes}}".
 *
 * @property int $ID
 * @property string $NAME
 * @property float $PERCENT
 * @property bool $ACTIVE
 */
class Tax extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tax}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'PERCENT'], 'required'],
            [['PERCENT'], 'number'],
            [['ACTIVE'], 'boolean'],
            [['NAME'], 'string', 'max' => 255],
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
            'PERCENT' => 'Percent',
            'ACTIVE' => 'Active',
        ];
    }
}
