<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%store}}".
 *
 * @property int $ID
 * @property string $NAME
 * @property string $ADDRESS
 * @property string $IMAGE
 * @property string $DATA_JSON
 * @property bool $ACTIVE
 */
class Store extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%store}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'ADDRESS'], 'required'],
            [['IMAGE', 'DATA_JSON'], 'string'],
            [['ACTIVE'], 'boolean'],
            [['NAME', 'ADDRESS'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'maxFiles' => '1'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NAME' => 'Nombre',
            'ADDRESS' => 'Dirección',
            'IMAGE' => 'Imagen',
            'DATA_JSON' => 'Informacion Complementaria',
            'ACTIVE' => 'Activo',
            'file' => 'Photo',
        ];
    }
}
