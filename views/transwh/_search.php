<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransWhSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-wh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_create') ?>

    <?= $form->field($model, 'trans_code') ?>

    <?= $form->field($model, 'trans_qty') ?>

    <?= $form->field($model, 'po_number') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'name_user_take') ?>

    <?php // echo $form->field($model, 'from_to') ?>

    <?php // echo $form->field($model, 'grpo_number') ?>

    <?php // echo $form->field($model, 'item_id') ?>

    <?php // echo $form->field($model, 'projectsub_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
