<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Projectsub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectsub-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'projectsub_number')->textInput() ?>

    <?= $form->field($model, 'projectsub_dscription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
