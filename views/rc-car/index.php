<?php

use app\models\RcCar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\UploadForm $uploadModel */
/** @var app\models\RcCarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rc Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rc-car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rc Car', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($uploadModel, 'imageFile')->fileInput() ?>

    <button>Submit</button>

    <?php ActiveForm::end() ?>

    <?php if (Yii::$app->session->hasFlash('uploadSuccess')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('uploadSuccess') ?>
        </div>
    <?php endif; ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'make',
            'model',
            'company',
            //'distributor',
            //'is_running',
            //'is_lipo',
            //'is_nimh',
            'needs_work',
            //'notes:ntext',
            //'create_ts',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RcCar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
