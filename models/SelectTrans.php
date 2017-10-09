<?php 
namespace app\models;

use Yii;
use Yii\base\Model;

class SelectTrans extends \yii\base\Model
{
	public $date1;
	public $date2;
	public $itemcode;
	

    public function rules()
    {
        return [
            [['date1', 'date2', 'itemcode'], 'required'],
            ['date1', 'date', 'format' => 'yyyy-MM-dd'],
        ];
    }
} 


?>