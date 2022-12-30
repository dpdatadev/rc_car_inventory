<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\RcCar;

$this->title = 'My RC Garage';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-2">RC Garage</h1>
        <?php if(!Yii::$app->user->isGuest): ?>
            <div class="container text-center">
                <p class="alert-info">
                    <i>There are <?=  RcCar::find()->count() ?> cars in the current inventory!</i>
                </p>
            </div>
        <?php else: ?>
        <p class="lead">Manage your RC Inventory</p>
        <?php endif; ?>
        <?= Html::img("https://th.bing.com/th/id/OIP.-uBunpeX45XgAwWzLxoIxQAAAA?pid=ImgDet&rs=1", ['alt' => 'Wrench']); ?>
    </div>

    <div class="body-content">
        <div class="container text-center">
            <?= Html::img('@web/arma_car_logo.jpg', ['alt' => 'Senton']) ?>
        </div>
    </div>
</div>
