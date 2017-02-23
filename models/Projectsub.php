<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projectsub".
 *
 * @property int $id
 * @property int $projectsub_number
 * @property string $projectsub_dscription
 * @property int $project_id
 * @property string $projectsub_number_id
 * 
 * @property Project $project
 * @property TransWh[] $transWhs
 */
class Projectsub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $project_dscription;    
    public static function tableName()
    {
        return 'projectsub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectsub_number'], 'required'],
            [['projectsub_number_id'], 'unique'],
            [['projectsub_number', 'project_id'], 'integer'],
            [['projectsub_dscription', 'project_dscription', 'projectsub_number_id'], 'string', 'max' => 225],
            [['projectsub_number', 'project_id'], 'unique', 'targetAttribute' => ['projectsub_number', 'project_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'projectsub_number' => Yii::t('app', 'Projectsub Number'),
            'projectsub_dscription' => Yii::t('app', 'Projectsub Dscription'),
            'project_id' => Yii::t('app', 'Project ID'),
            'projectsub_number_id' => Yii::t('app', 'Projectsub Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransWhs()
    {
        return $this->hasMany(TransWh::className(), ['projectsub_id' => 'id']);
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
    
   /*public function afterSave($insert){
        parent::afterSave($insert);
        if ($insert){
            $last = $this->find()->select(['id'])->orderBy(['id'=>SORT_DESC])->limit(1)->one();
            if($last){
                //$NEW_ID = (int)$last->id+1;
                $number = $last->projectsub_number;
                $proj = Project::findOne(['id'=>$last->project_id]);
                $project_number = $proj->project_number;
                $x = "$project_number-$number";
                $last->projectsub_number_id = $x;
                $last->save();
            } 
            else {
                $NEW_ID = 1;
            }
            $this->id = $NEW_ID;
        }
        return true;
    }*/
    
}
