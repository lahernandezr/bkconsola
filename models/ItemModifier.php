<?php
namespace app\models;

use app\models\Item;
use Yii;
/**
 * This is the model class for table "{{%item}}".
 *
 * @property int $ID
 * @property string $NAME
 * @property string $DESCRIPCION
 * @property string $BARCODE
 * @property int $ID_CATEGORY
 * @property float $PRICE_COST
 * @property float $PRICE_SELL
 * @property string $IMAGE
 * @property int $ID_TAX
 * @property bool $ON_SALE
 * @property string|null $INIT
 * @property string|null $END
* @property string $ID_TYPE_ITEM
 * @property bool $ACTIVE
 */
class ItemModifier extends Item
{

}