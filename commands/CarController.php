<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

use app\models\RcCar;

/**
 * This command displays information about the the Rc Car inventory.
 */
class CarController extends Controller
{
    /**
     * This command echoes how many Rc Cars are in inventory.
     * @return int Exit code
     */
    public function actionCount()
    {
        echo "There are " . RcCar::find()->count() . " cars in the current inventory.";

        return ExitCode::OK;
    }

    /**
     * This command echoes how many Rc Cars need work done in inventory.
     * @return int Exit code
     */
    public function actionNeedsWork()
    {
        $carsNeedWorkCount = count(RcCar::find()->where(['needs_work' => true])->all());

        echo "There are " . $carsNeedWorkCount . " cars that actively need work done.";

        return ExitCode::OK;
    }
}
