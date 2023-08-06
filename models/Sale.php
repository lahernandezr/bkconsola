<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sale}}".
 *
 * @property int $ID
 * @property int $ID_USER
 * @property int $ID_ADDRESS
 * @property float $SUBTOTAL
 * @property float $TAXES
 * @property float $TOTAL
 * @property float $TENDER
 * @property float $PAYMENTS
 * @property float $CHANGED
 * @property string $NOTES
 * @property string $CREATED_AT
 * @property bool $ACTIVE
 */
class Sale extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sale}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_USER', 'ID_ADDRESS', 'SUBTOTAL', 'TAXES', 'TOTAL', 'TENDER', 'PAYMENTS', 'CHANGED', 'NOTES', 'CREATED_AT'], 'required'],
            [['ID_USER', 'ID_ADDRESS'], 'integer'],
            [['SUBTOTAL', 'TAXES', 'TOTAL', 'TENDER', 'PAYMENTS', 'CHANGED'], 'number'],
            [['CREATED_AT'], 'safe'],
            [['ACTIVE'], 'boolean'],
            [['NOTES'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_USER' => 'User',
            'ID_ADDRESS' => 'Address',
            'SUBTOTAL' => 'Subtotal',
            'TAXES' => 'Taxes',
            'TOTAL' => 'Total',
            'TENDER' => 'Tender',
            'PAYMENTS' => 'Payments',
            'CHANGED' => 'Changed',
            'NOTES' => 'Notes',
            'CREATED_AT' => 'Created At',
            'ACTIVE' => 'Active',
        ];
    }
}
