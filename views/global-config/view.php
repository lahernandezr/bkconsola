<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GlobalConfig */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Global Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="global-config-view">

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'VALUE',
            'DESCRIPTION',
        ],
    ]) ?>

</div>
