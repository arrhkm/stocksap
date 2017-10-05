<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransWhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Transaction WH By Itemcode');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-wh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a(Yii::t('app', 'Create Trans Wh'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back to Transaction'), ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager'=>['firstPageLabel'=>'First', 'lastPageLabel'=>'Last'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'itemcode',
            'item_name',
            'receive',
            'issued', 
            'saldo', 
            //'id',
            //'date_create',
            //'trans_code',
            //'trans_qty',
            //'po_number',
            //'location',
            //'name_user_take',
            //'from_to',
            //'grpo_number',
            //'item_id',
            
            //'projectsub_id',
            //[
            //  'attribute'=> 'projectsub_id',
            //  'value'=>'projectsub.projectsub_dscription',
            //],
            
            //[
            //    'attribute'=>'Fase',                    
            //    'value'=>function($model){
            //        return $model->projectsub->projectsub_dscription;        
            //    },
                
            //],
            //[
            //    'attribute'=>'projectsub.project.project_number',
            //],
            //'projectsub_dscription',
            
            

            //['class' => 'yii\grid\ActionColumn', 'template' => '{}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
