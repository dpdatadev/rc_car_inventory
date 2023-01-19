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
use yii\web\Response;
use yii\web\UploadedFile;


/**
 * RcCarController implements the CRUD actions for RcCar model.
 */
class RcCarController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'index' => ['GET'],
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'view', 'create'],
                    'rules' => [
                        [
                            'allow' => true,
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
    public function actionIndex(): string
    {
        $searchModel = new RcCarSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single RcCar model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(string $id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RcCar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate(): string | Response
    {
        $model = new RcCar();
        $uploadModel = new UploadForm();
        if ($this->request->isPost) {
            $uploadModel->imageFile = UploadedFile::getInstance($uploadModel, 'imageFile');
            if ($model->load($this->request->post()) && $uploadModel->upload())
            {
                $imageName = $uploadModel->imageFile->name;

                $model->imageFilePath = $imageName; //TODO, not setting properly

                if ($model->save())
                {
                    // file is uploaded successfully
                    Yii::$app->session->setFlash('uploadSuccess', "Image uploaded successfully! " . $imageName);
                    // display the uploaded image name in view (until timeout, TODO -- still trying to persist file path to RcCar model)
                    Yii::$app->session->set('imageFileName', $imageName);
                    //only to be set for displaying on index page until deleted
                    Yii::$app->session->set('imageFileNameIndex', $imageName);
                    //redirect to view and see the new car
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }
        }

        return $this->render('create', [
            'model' => $model,
            'uploadModel' => $uploadModel,
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
        $uploadModel = new UploadForm();

        if ($this->request->isPost) {
            $uploadModel->imageFile = UploadedFile::getInstance($uploadModel, 'imageFile');
            if ($model->load($this->request->post()) && $uploadModel->upload())
            {
                $imageName = $uploadModel->imageFile->name;

                if ($model->save())
                {
                    $model->imageFilePath = $imageName;
                    Yii::$app->session->set('imageFileName', $imageName);
                    Yii::$app->session->set('imageFileNameIndex', $imageName);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'uploadModel' => $uploadModel
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
        $model = $this->findModel($id);
        //unlink(Yii::getAlias('@web/' . $model->imageFilePath)); TODO no permission to unlink image (remove file)
        $model->delete();
        if (Yii::$app->session->has('imageFileNameIndex'))
        {
            Yii::$app->session->destroy('imageFileNameIndex');
        }

        Yii::$app->session->setFlash('deleteSuccess', "Car successfully deleted!");
        $this->redirect(['index']);

    }

    /**
     * Finds the RcCar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return RcCar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): RcCar
    {
        if (($model = RcCar::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
