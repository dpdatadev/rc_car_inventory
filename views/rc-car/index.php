<?php

use app\models\RcCar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
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


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'make',
            'model',
            'company',
            //'distributor',
            'is_running:boolean',
            //'is_lipo',
            //'is_nimh',
            'needs_work:boolean',
            //'notes:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, RcCar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?php if (Yii::$app->session->has('imageFileNameIndex')) : ?>
        <?php $imageFileName = Yii::$app->session->get('imageFileNameIndex'); ?>
        <div class="container text-center">
            <p class="lead text-center">Recent Images:</p><br />
            <?= Html::img('@web/' . $imageFileName, ['alt' => 'carUpload', 'height' => '300', 'width' => '300']) ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('deleteSuccess')) : ?>
        <div class="alert alert-success"> <!--alert-dismissable-->
            <!--<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>-->
            <h4><i class="icon fa fa-check"></i>Deleted!</h4>
            <?= Yii::$app->session->getFlash('deleteSuccess') ?>
        </div>
    <?php endif; ?>

</div>
