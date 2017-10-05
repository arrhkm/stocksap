<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\jui\AutoComplete;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\TransWh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-wh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /* echo AutoComplete::widget([
       'model' => $model,
       //'attribute' => 'country',
       'clientOptions' => [
           'source' => Url::toRoute(['transwh/ajax-kurir']),
           'minLength'=> 1,
           'autoFill'=>true,
        'select' => new JsExpression(
        "function( event, ui ) {
        console.log(ui.item.id);
                       
                   }"
               )
       ],
       'options' => [
               'class' => 'form-control'
           ]
    ]); */?>

    <?php 
/*
    echo AutoComplete::widget([
       'model' => $model,
       'attribute' => 'item',
       'clientOptions' => [
           'source' => Url::toRoute(['transwh/ajax-itemcode']),
           'minLength'=> 1,
           'autoFill'=>true,
        'select' => new JsExpression(
        "function( event, ui ) {
        console.log(ui.item.id);
                       
                   }"
               )
       ],
       'options' => [
               'class' => 'form-control'
           ]
    ]);*/?>

    <?= $form->field($model, 'item_id')->widget(\kartik\select2\Select2::className(), [
        'name'=>'item',
        'data'=>$items,
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select a Item  ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>
    
    <?= $form->field($model, 'date_create')->textInput() ?>

    <?php //= $form->field($model, 'trans_code')->textInput() ?>
    <?php 
        
    ?>
    <?= $form->field($model, 'trans_code')->widget(Select2::className(),[
            'data'=> $list_transcode,
            'size' => Select2::SMALL,
            'options' => ['placeholder' => 'Select a code  ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            'pluginLoading'=>true,
            
    ]);?>

    

    <?= $form->field($model, 'trans_qty')->textInput() ?>

    <?php //= $form->field($model, 'item_id')->textInput() ?>
    

    <?php //= $form->field($model, 'projectsub_id')->textInput() ?>
    <?= $form->field($model, 'projectsub_id')->widget(Select2::className(),[
        'data'=>$projectsub,
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select a Project  ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    
    <?= $form->field($model, 'po_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_user_take')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grpo_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pr_number')->textInput(['maxlength' => true]) ?>
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


