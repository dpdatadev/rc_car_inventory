<?php

namespace app\controllers;

use app\models\RcCar;
use app\models\RcCarSearch;
use app\models\UploadForm;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * RcCarController implements the CRUD actions for RcCar model.
 */
class RcCarController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'view', 'create'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index', 'view', 'create'],
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ],
        );
    }
    /**
     * Lists all RcCar models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $uploadModel = new UploadForm();
        $searchModel = new RcCarSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (Yii::$app->request->isPost) {
            $uploadModel->imageFile = UploadedFile::getInstance($uploadModel, 'imageFile');
            if ($uploadModel->upload()) {
                // file is uploaded successfully
                Yii::$app->session->setFlash('uploadSuccess', "Image uploaded successfully! " . $uploadModel->imageFile->name);
                // display the uploaded image below the gridview
                Yii::$app->session->set('imageFileName', $uploadModel->imageFile->name);
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'uploadModel' => $uploadModel,
                    'dataProvider' => $dataProvider
                ]);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'uploadModel' => $uploadModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single RcCar model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RcCar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RcCar();
        if ($this->request->isPost) {
            //$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->load($this->request->post()) && $model->save()) {
                var_dump($this->request->post());
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $model->loadDefaultValues();
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RcCar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RcCar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

    }

    /**
     * Finds the RcCar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return RcCar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RcCar::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
