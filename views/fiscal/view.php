<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fiscal */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Fiscals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fiscal-view">

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
            'TYPE',
            'AUTH_RESOLUTION',
            'AUTH_DATE',
            'SERIE',
            'INIT',
            'END',
            'CURRENT',
            'CREATED_AT',
            'ACTIVE:boolean',
        ],
    ]) ?>

</div>
