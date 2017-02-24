<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trans_wh".
 *
 * @property int $id
 * @property string $date_create
 * @property int $trans_code
 * @property int $trans_qty
 * @property string $po_number
 * @property string $location
 * @property string $name_user_take
 * @property string $from_to
 * @property string $grpo_number
 * @property int $item_id
 * @property int $projectsub_id
 *
 * @property Item $item
 * @property Projectsub $projectsub
 */
class TransWh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $projectsub_dscription;
    public $receive;
    public $itemcode;
    public $issued;
    public $saldo;
    public $item_name;
    public $projectsub_number_id;
    public $t_code;
    public static function tableName()
    {
        return 'trans_wh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_create'], 'safe'],
            [['trans_code', 'trans_qty', 'projectsub_id', 'item_id'], 'required'],
            [['trans_code', 'trans_qty', 'item_id', 'projectsub_id', 'receive'], 'integer'],
            [['po_number', 'grpo_number', 'projectsub_dscription', 'itemcode'], 'string', 'max' => 50],
            [['location', 'name_user_take', 'from_to'], 'string', 'max' => 225],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['projectsub_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projectsub::className(), 'targetAttribute' => ['projectsub_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date_create' => Yii::t('app', 'Date Create'),
            'trans_code' => Yii::t('app', 'Transaction'),
            'trans_qty' => Yii::t('app', 'Quantity'),
            'po_number' => Yii::t('app', 'PO./BBM/S.JLN'),
            'location' => Yii::t('app', 'Location'),
            'name_user_take' => Yii::t('app', 'Name User Take'),
            'from_to' => Yii::t('app', 'Supplier'),
            'grpo_number' => Yii::t('app', 'No. GRPO'),
            'item_id' => Yii::t('app', 'Item Barang'),
            'projectsub_id' => Yii::t('app', 'Project/SO.'),
            'receive'=>Yii::t('app', 'In'),
            'issued'=>Yii::t('app', 'Out'),
            't_code'=>Yii::t('app', 'Transaksi'),
            'projectsub_number_id' => Yii::t('app', 'No. S.O-Fase.'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectsub()
    {
        return $this->hasOne(Projectsub::className(), ['id' => 'projectsub_id']);
    }
    
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if ($this->isNewRecord)
        {
            $last = $this->find()->select(['id'])->orderBy(['(id)'=>SORT_DESC])->limit(1)->one();
            if($last)
            {
                $NEW_ID = (int)$last->id+1;
            }
            else {
                $NEW_ID= 1;
            }
            $this->id= $NEW_ID;
        }
        return true;
    }
    
   
    
}
