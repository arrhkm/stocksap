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
        <?= Html::a(Yii::t('app', 'Create Trans Wh'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date_create',
            'trans_code',
            'trans_qty',
            'po_number',
             'location',
             'name_user_take',
             'from_to',
             'grpo_number',
            'item_id',
            'projectsub_id',
            //[
            //  'attribute'=> 'projectsub_id',
            //  'value'=>'projectsub.projectsub_dscription',
            //],
            [
                'attribute'=>'projectsub_dscription',                    
                'value'=>function($model){
                    return $model->projectsub->projectsub_dscription;
        
                },
                
            ],
            //'projectsub_dscription',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
