<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RcCar $model */
/** @var app\models\UploadForm $uploadModel */

$this->title = 'Create Rc Car';
$this->params['breadcrumbs'][] = ['label' => 'Rc Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rc-car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadModel' => $uploadModel,
    ]) ?>

</div>
