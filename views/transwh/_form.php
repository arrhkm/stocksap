<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\TransWh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-wh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?php //= $form->field($model, 'trans_code')->textInput() ?>
    <?php 
        
    ?>
    <?= $form->field($model, 'trans_code')->widget(Select2::className(),[
            'data'=> $list_transcode,
           
    ]);?>

    <?= $form->field($model, 'trans_qty')->textInput() ?>

    <?php //= $form->field($model, 'item_id')->textInput() ?>
    <?= $form->field($model, 'item_id')->widget(\kartik\select2\Select2::className(), [
        'data'=>$items,
        
    ])?>

    <?php //= $form->field($model, 'projectsub_id')->textInput() ?>
    <?= $form->field($model, 'projectsub_id')->widget(Select2::className(),[
        'data'=>$projectsub,
        
    ]) ?>
    
    <?= $form->field($model, 'po_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_user_take')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grpo_number')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
