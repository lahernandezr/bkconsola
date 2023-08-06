<?php

namespace app\models;

use Yii;
use app\models\Tax;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $ID
 * @property string $NAME
 * @property int $ID_TAX
 * @property string|null $BACKGROUND
 * @property string|null $FORECOLOR
 * @property string|null $IMAGE
 * @property int|null $ORDER
 * @property bool $ONSALE
 * @property string|null $INIT
 * @property string|null $END
 * @property bool $ACTIVE
 */
class Category extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'ID_TAX'], 'required'],
            [['ID_TAX', 'ORDER'], 'integer'],
            [['IMAGE'], 'string'],
            [['ONSALE', 'ACTIVE','IS_SHOW'], 'boolean'],
            [['INIT', 'END'], 'safe'],
            [['NAME'], 'string', 'max' => 255],
            [['BACKGROUND', 'FORECOLOR'], 'string', 'max' => 20],
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
            'NAME' => 'Name',
            'ID_TAX' => 'Tax',
            'BACKGROUND' => 'Background',
            'FORECOLOR' => 'Forecolor',
            'IMAGE' => 'Image',
            'ORDER' => 'Order',
            'ONSALE' => 'Onsale',
            'INIT' => 'Init',
            'END' => 'End',
            'IS_SHOW' => 'Show',
            'ACTIVE' => 'Active',
            'file' => 'Photo',
        ];
    }

    public function getTax()
    {
        return $this->hasOne(Tax::className(), ['ID' => 'ID_TAX']);
    }

    public function getShowBackgroundColor() {
        return "<div style= 'background:". $this->BACKGROUND . "; width: 20px; height: 20px;'></div>" . $this->BACKGROUND;
    }

    public function getShowForecolor() {
        return "<div style= 'background:". $this->FORECOLOR . "; width: 20px; height: 20px;'></div>" . $this->FORECOLOR;
    }
}
