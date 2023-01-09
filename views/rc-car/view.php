<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//use yii\imagine\Image;


/** @var yii\web\View $this */
/** @var app\models\RcCar $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rc Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rc-car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'name',
            'make',
            'model',
            'company',
            'distributor',
            'is_running:boolean',
            'is_lipo:boolean',
            'is_nimh:boolean',
            'needs_work:boolean',
            'notes:ntext',
            'create_ts:datetime',
        ],
    ]) ?>

    <!--TODO -- Image::thumbnail()-->
    <?= Html::img(Yii::getAlias('@web/arma_car.jpg'), ['height' => 400, 'width' => 400]); ?>

</div>
