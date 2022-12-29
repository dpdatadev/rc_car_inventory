<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My RC Garage';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-2">RC Garage</h1>

        <p class="lead">Manage your RC Inventory</p>
        <?= Html::img("https://th.bing.com/th/id/OIP.-uBunpeX45XgAwWzLxoIxQAAAA?pid=ImgDet&rs=1", ['alt' => 'Wrench']); ?>

    </div>

    <div class="body-content">
        <div class="container text-center">
            <?= Html::img('@web/arma_car_logo.jpg', ['alt' => 'Senton']) ?>
        </div>
    </div>
</div>
