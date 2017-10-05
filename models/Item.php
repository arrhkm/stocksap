<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $itemcode
 * @property string $item_name
 *
 * @property TransWh[] $transWhs
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemcode'], 'required'],
            [['id'], 'integer'],
            [['item_name'], 'string'],
            [['itemcode'], 'string', 'max' => 20],
            [['itemcode'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'itemcode' => Yii::t('app', 'Itemcode'),
            'item_name' => Yii::t('app', 'Item Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransWhs()
    {
        return $this->hasMany(TransWh::className(), ['item_id' => 'id']);
    }
    
    public function beforeSave($insert){
        parent::beforeSave($insert);
        if ($this->isNewRecord){
            $last = $this->find()->select(['id'])->orderBy(['id'=>SORT_DESC])->limit(1)->one();
            if($last){
                $NEW_ID = (int)$last->id+1;
            } else {
                $NEW_ID = 1;
            }
            $this->id = $NEW_ID;
        }
        return true;
    }
            
}
