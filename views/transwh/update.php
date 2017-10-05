<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TransWh */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Trans Wh',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trans Whs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="trans-wh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list_transcode'=>$list_transcode,
        'projectsub'=>$projectsub,
        'items'=> $items,
    ]) ?>

</div>
