<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RcCar $model */
/** @var app\models\UploadForm $uploadModel */

$this->title = 'Update Rc Car: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rc Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rc-car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadModel' => $uploadModel
    ]) ?>

</div>
