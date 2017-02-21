<?php

namespace app\controllers;

use Yii;
use app\models\TransWh;
use app\models\TransWhSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Transcode;
use app\models\Item;
use app\models\Projectsub;
use yii\helpers\ArrayHelper;
use app\models\TransWhSearchByItemcode;
/**
 * TranswhController implements the CRUD actions for TransWh model.
 */
class TranswhController extends Controller
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
     * Lists all TransWh models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransWhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionIndex2()
    {
        $searchModel = new TransWhSearchByItemcode();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransWh model.
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
     * Creates a new TransWh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransWh();
        
        $projectsub = ArrayHelper::map(Projectsub::find()->from('projectsub as a')
                ->innerJoin('project as b', 'b.id = a.project_id')->all(), 'id', 'projectsub_dscription');
        
        $list_transcode = arrayHelper::map(Transcode::find()->all(), 'id', 'transcode_name');
        $items = ArrayHelper::map(Item::find()->all(), 'id', 'item_name');
        $model->date_create = date('Y-m-d');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'list_transcode'=>$list_transcode,
                'projectsub'=>$projectsub,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Updates an existing TransWh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        
        $projectsub = ArrayHelper::map(Projectsub::find()
            ->from('projectsub as a')
            ->innerJoin('project as b', 'b.id = a.project_id')
            ->all(), 'id', 'projectsub_dscription');
        
        $list_transcode = arrayHelper::map(Transcode::find()->all(), 'id', 'transcode_name');
        $items = ArrayHelper::map(Item::find()->all(), 'id', 'item_name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'list_transcode'=>$list_transcode,
                'projectsub'=>$projectsub,
                'items'=> $items,
            ]);
        }
    }

    /**
     * Deletes an existing TransWh model.
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
     * Finds the TransWh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TransWh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransWh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
