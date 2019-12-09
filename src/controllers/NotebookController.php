<?php

namespace itshkacomua\notebook\controllers;

use Yii;
use itshkacomua\notebook\models\Notebook;
use itshkacomua\notebook\models\NotebookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NotebookController implements the CRUD actions for Notebook model.
 */
class NotebookController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Notebook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotebookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notebook model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Notebook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notebook();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            if (!Yii::$app->user->isGuest) {
                $model->user_id = Yii::$app->user->getId();
            }

            if (strlen($model->calendar_time) > 1) {
                $model->calendar_time = strtotime($model->calendar_time);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Notebook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (strlen($model->calendar_time) > 1) {
                $model->calendar_time = strtotime($model->calendar_time);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $model->calendar_time = date('d.m.Y h:i', $model->calendar_time);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Notebook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Notebook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notebook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notebook::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
