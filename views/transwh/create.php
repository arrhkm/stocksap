<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TransWh */

$this->title = Yii::t('app', 'Create Trans Wh');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trans Whs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-wh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list_transcode'=> $list_transcode,
        'projectsub'=>$projectsub,
        'items'=> $items,
    ]) ?>

</div>
