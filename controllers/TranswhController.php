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
        $model = TransWh::find()->where(['id'=>$id])
                ->with('item', 'projectsub')
                ->one();
        return $this->render('view', [
            //'model' => $this->findModel($id),
            'model'=>$model,
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
        
        $items = ArrayHelper::map(Item::find()->select(['id', 'item_name'=>'concat(itemcode,"-",item_name)'])->all(), 'id', 'item_name');
        $projectsub = ArrayHelper::map(Projectsub::find()
            ->from('projectsub as a')
            ->select(['a.id','projectsub_number_id'=>'concat(a.projectsub_number_id," - ", b.project_dscription)'])
            ->innerJoin('project as b', 'b.id = a.project_id')->all(), 'id', 'projectsub_number_id');
        
        $list_transcode = arrayHelper::map(Transcode::find()->all(), 'id', 'transcode_name');
        
        $model->date_create = date('Y-m-d');
        if ($model->load(Yii::$app->request->post())) {
            if ($this->saldoEmpty($model->item_id, $model->trans_qty, $model->trans_code)){
                $model->addError('trans_qty', 'Quantity item  is not already, this saldo('.$this->getSaldo($model->item_id, $model->trans_qty).') < Quantity issued!');
                //yii::$app->session->setFlash('error', 'Leave Entitlement for this user already input');
                return $this->render('create', [
                    'model' => $model,
                    'list_transcode'=>$list_transcode,
                    'projectsub'=>$projectsub,
                    'items'=> $items,
                ]);
            }
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
                    
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
        
        $items = ArrayHelper::map(Item::find()->select(['id', 'item_name'=>'concat(itemcode,"-",item_name)'])->all(), 'id', 'item_name');
        $projectsub = ArrayHelper::map(Projectsub::find()
            ->from('projectsub as a')
            ->select(['a.id','projectsub_number_id'=>'concat(a.projectsub_number_id," - ", b.project_dscription)'])
            ->innerJoin('project as b', 'b.id = a.project_id')->all(), 'id', 'projectsub_number_id');
        
        $list_transcode = arrayHelper::map(Transcode::find()->all(), 'id', 'transcode_name');
        
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
    protected function findModel($id){       
        
        if (($model = TransWh::findOne($id)) !== null) {         
                return $model;
        } else {
                throw new NotFoundHttpException('The requested page does not exist.');
        }
               
    }
    public function saldoEmpty($item_id, $qty, $trans_code){
        if ($trans_code == 2){
            
            $tWh = TransWh::find()
            ->alias('a')
            ->select([
                'saldo'=>'sum(if(a.trans_code=1, a.trans_qty, 0)) - sum(if(a.trans_code=2,a.trans_qty,0))'                    
                ,'a.trans_code'
                ,'a.trans_qty'
            ])
            ->where(['a.item_id'=>$item_id])
            ->groupBy('a.item_id')->one();
            
            if ($tWh->saldo < $qty){
                return true;
            }
            return false;
            
            
        } 
        return false;
        
    }
    public function getSaldo($item_id, $qty){
        $tWh = TransWh::find()
            ->alias('a')
            ->select([
                'saldo'=>'sum(if(a.trans_code=1, a.trans_qty, 0)) - sum(if(a.trans_code=2,a.trans_qty,0))'                    
                ,'a.trans_code'
                ,'a.trans_qty'
            ])
            ->where(['a.item_id'=>$item_id])
            ->groupBy('a.item_id')->one();
        return $tWh->saldo;
    }
}
