<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

$form = ActiveForm::begin([
    'id' => 'history-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'date1')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    	'dateFormat' => 'yyyy-MM-dd',
	]) ?>
    
    <?= $form->field($model, 'date2')->widget(\yii\jui\DatePicker::classname(), [
		'dateFormat'=>'yyyy-MM-dd',
	])?>
	<?= $form->field($model, 'itemcode')->widget(\kartik\select2\Select2::className(), [
        'name'=>'item',
        'data'=>$items,
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select a Item  ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>
    	
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>

<?php 
echo "data nya adalah : ";
//echo "<table border=1>";
?>
<table align="center" border="2" cellpadding="1" cellspacing="1">
	<tr align="center">
	<td colspan="1">date create</td>
	<td>Item code</td>
	<td>Item</td>
	<td>Project Number</td>
	<td>receive</td>
	<td>issued</td>
	<td>Saldo</td>
	<td>PO</td>
	<td>date create</td>
	<td>User</td>
	<td>From To </td>
	<td>Grpo Number</td>
	<td>Purcash Request</td>
</tr>
<?php 

$saldo=0;
$dt_in=0;
$dt_out=0;

if (isset($row)){
	foreach ($row as $qrow){
		$dt_in=$dt_in+$qrow['t_in'];
		$dt_out=$dt_out+$qrow['t_out'];
		$saldo = $dt_in-$dt_out;
		echo "<tr align=center>
		<td colspan =1>".$qrow['date_create']."</td>
		<td colspan =1>".$qrow['itemcode']."</td>
		<td colspan=1>".$qrow['item_name']."</td>
		<td>".$qrow['project_number']."</td>
		<td>".$qrow['t_in']."</td>
		<td>".$qrow['t_out']."</td>
		<td align='center'>".$saldo."</td>
		<td>".$qrow['po_number']."</td>
		<td>".$qrow['name_user_take']."</td>
		<td>".$qrow['from_to']."</td>		
		<td>".$qrow['grpo_number']."</td>
		<td>".$qrow['pr_number']."</td></tr>";
		

	}
	
}
echo "</table>";

?>