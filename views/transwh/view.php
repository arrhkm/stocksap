<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use kartik\

/* @var $this yii\web\View */
/* @var $model app\models\TransWh */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trans Whs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-wh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date_create',
            'trans_code',
            'trans_qty',
            'po_number',
            'location',
            'name_user_take',
            'from_to',
            'grpo_number',
            
            'item.item_name',
            'item.itemcode',           
            
            'projectsub.projectsub_number_id',
            'projectsub.project.project_dscription',            
        ],
    ]) ?>

</div>
