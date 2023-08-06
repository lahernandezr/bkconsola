<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%global_config}}".
 *
 * @property string $ID
 * @property string $VALUE
 * @property string|null $DESCRIPTION
 */
class GlobalConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%global_config}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'VALUE'], 'required'],
            [['ID'], 'string', 'max' => 20],
            [['VALUE', 'DESCRIPTION'], 'string', 'max' => 255],
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
            'VALUE' => 'Value',
            'DESCRIPTION' => 'Description',
        ];
    }
}
