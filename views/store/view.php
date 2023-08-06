<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Store */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="store-view">

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

    <div class="row">
        <div class="col-md-8">
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'ID',
                'NAME',
                'ADDRESS',
                // 'IMAGE:ntext',
                'DATA_JSON:ntext',
                'ACTIVE:boolean',
            ],
            ]) ?>
        </div>
        <div class="col-md-4">
            <div class="col-md-4">
                <?= Html::img('@web/uploads/stores/' . $model->IMAGE, ['alt'=>'some', 'class'=>'thing', 'style'=>'width:300px']);?>
            </div>
        </div>
    </div>

    

</div>
