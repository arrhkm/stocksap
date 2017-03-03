<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transaction Select Item');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-wh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'id',
                'headerOptions'=>['style'=>'width:1%']
            ],
            [
                'attribute'=>'itemcode',
                'headerOptions' => ['style' => 'width:10%']
            ],
            [
                'attribute'=>'item_name',
                'headerOptions'=>['style'=>'width:70%']
            ],
            //'itemcode',
            //'item_name:ntext',

            [
                'class' => 'yii\grid\ActionColumn', 
                'template' => '{create}',
                'buttons' => [
                    //'view' => function ($url, $model) {
                    //    (...)
                    //},
                    'create' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create', 'item_id'=>$model->id],['title'=>'Create']);
                    }
                ],
                'urlCreator' => function ($action, $model, $key) {
                    if ($action === 'create') {                     
                        return Url::to([$action,'id'=>$key]);
                    }
                }
                
            ],
            
             
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>