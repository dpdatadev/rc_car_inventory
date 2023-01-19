<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UploadForm $uploadModel */
/** @var app\models\RcCar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rc-car-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'make')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distributor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_running')->textInput() ?>

    <?= $form->field($model, 'is_lipo')->textInput() ?>

    <?= $form->field($model, 'is_nimh')->textInput() ?>

    <?= $form->field($model, 'needs_work')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <p class="info"><small>Configured upload location:
            <pre>Directory: ./web</pre> Name the image file with this convention:
            <pre>(make)_(optional_info)_car.jpg/png</pre>
        </small></p>

    <?= $form->field($uploadModel, 'imageFile')->fileInput() ?>

    <br />

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
