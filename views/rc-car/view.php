<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//use yii\imagine\Image;


/** @var yii\web\View $this */
/** @var app\models\RcCar $model */


/*TODO (1/9/2023)
 * Still trying to get the UploadForm Imagefile name to persist to the RcCar model imageFilePath property.
 * For now, having to rely on session variables (while admin is logged in) or a convention based approach
 * where the photo is loaded from the directory based on the make of the car.
 */

$viewImage = '';

if (Yii::$app->session->has('imageFileName')) {
    $viewImage = Yii::$app->session->get('imageFileName');
} else {
    $viewImage = strtolower($model->model) . '_car.jpg';
}

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
            [
                'label' => 'Car Image',
                'attribute' => 'imageFilePath',
                'value' => Yii::getAlias('@web/' . $viewImage),
                'format' => ['image', ['width' => 200, 'height' => 200]],
            ],
        ],
    ]) ?>

    <?php if (Yii::$app->session->hasFlash('uploadSuccess')) : ?>
        <div class="alert alert-success alert-dismissable"> <!--TODO: make dismissable?-->
            <!--<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>-->
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('uploadSuccess') ?>
        </div>
    <?php endif; ?>

    <!--TODO -- Image::thumbnail()-->


</div>
