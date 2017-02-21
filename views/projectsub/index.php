<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use app\models\Projectsub;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectsubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Projectsubs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectsub-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Projectsub'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'Project Number',
                'value'=>'project.project_number',
                  
            ],
            'projectsub_number',
            'projectsub_dscription',
            'project_id',
            
            'project.project_dscription',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<?php 
//$modelx =Projectsub::find()->where(['id'=>1])->one();
//echo $modelx->project->project_dscription;
?>
