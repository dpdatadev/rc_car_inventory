<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RcCarSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rc-car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'make') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'distributor') ?>

    <?php // echo $form->field($model, 'is_running') ?>

    <?php // echo $form->field($model, 'is_lipo') ?>

    <?php // echo $form->field($model, 'is_nimh') ?>

    <?php // echo $form->field($model, 'needs_work') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'create_ts') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
