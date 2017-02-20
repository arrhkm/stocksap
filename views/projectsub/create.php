<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Projectsub */

$this->title = Yii::t('app', 'Create Projectsub');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projectsubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectsub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list_project'=>$list_project,
    ]) ?>

</div>
