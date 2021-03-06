<?php

namespace app\controllers;

use Yii;
use app\models\Projectsub;
use app\models\ProjectsubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Project;
use yii\helpers\ArrayHelper;

/**
 * ProjectsubController implements the CRUD actions for Projectsub model.
 */
class ProjectsubController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Projectsub models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectsubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $model2 = new Projectsub;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model2'=>$model2,
        ]);
    }

    /**
     * Displays a single Projectsub model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Projectsub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projectsub();
        $project = ArrayHelper::map(Project::find()->all(), 'id', 'project_number','project_dscription');
        if ($model->load(Yii::$app->request->post())) {
            $number= $model->projectsub_number;
            $project = Project::findOne(['id'=>$model->project_id]);
            $code = $project->project_number;
            $model->projectsub_number_id="$code-$number";
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'list_project'=>$project,
            ]);
        }
    }

    /**
     * Updates an existing Projectsub model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $project = ArrayHelper::map(Project::find()->all(), 'id', 'project_number','project_dscription');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'list_project'=>$project,
                
            ]);
        }
    }

    /**
     * Deletes an existing Projectsub model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projectsub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projectsub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projectsub::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
