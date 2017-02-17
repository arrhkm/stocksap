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
            [['trans_code', 'trans_qty'], 'required'],
            [['trans_code', 'trans_qty', 'item_id', 'projectsub_id'], 'integer'],
            [['po_number', 'grpo_number'], 'string', 'max' => 50],
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
            'trans_code' => Yii::t('app', 'Trans Code'),
            'trans_qty' => Yii::t('app', 'Trans Qty'),
            'po_number' => Yii::t('app', 'Po Number'),
            'location' => Yii::t('app', 'Location'),
            'name_user_take' => Yii::t('app', 'Name User Take'),
            'from_to' => Yii::t('app', 'From To'),
            'grpo_number' => Yii::t('app', 'Grpo Number'),
            'item_id' => Yii::t('app', 'Item ID'),
            'projectsub_id' => Yii::t('app', 'Projectsub ID'),
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
}
