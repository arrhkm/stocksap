<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransWhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Trans Whs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-wh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a(Yii::t('app', 'Create Trans Wh'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Create Trans Wh'), ['selectitem'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'View By Itemcode'), ['index2'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                
            ],

            //'id',
            [
                'attribute'=>'itemcode',
                'headerOptions' => ['style' => 'width:10%']
            ],
            [
                'attribute'=>'item_name',                    
                'headerOptions' => ['style' => 'width:30%']
                
            ],    
            [
                'attribute'=>'date_create',
                'headerOptions' => ['style' => 'width:10%']
            ],
            [
                //'attribute'=>'trans_code',
                'attribute'=>'t_code',
                'headerOptions' => ['style' => 'width:5%']
            ],
            [
                'attribute'=>'trans_qty',
                'headerOptions' => ['style' => 'width:5%']
            ],
            [
                'attribute'=>'po_number',
                'headerOptions' => ['style' => 'width:5%']
            ],
            //'location',
            //'name_user_take',
            //'from_to',
            [
                'attribute'=>'grpo_number',
                'headerOptions' => ['style' => 'width:5%']
            ],            
            [
                'attribute'=>'pr_number',
                'headerOptions' => ['style' => 'width:5%']
            ],
            //'item_id',
               
            //'item_name',
            [
                'attribute'=>'projectsub_number_id',
                'headerOptions' => ['style' => 'width:10%']
            ],
            //[
            //  'attribute'=> 'projectsub_id',
            //  'value'=>'projectsub.projectsub_dscription',
            //],
            
            

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:10%'],
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
