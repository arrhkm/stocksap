<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $project_number
 * @property string $project_dscription
 *
 * @property Projectsub[] $projectsubs
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_number'], 'required'],
            [['project_number'], 'string', 'max' => 255],
            [['project_dscription'], 'string', 'max' => 225],
            [['project_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_number' => Yii::t('app', 'Project Number'),
            'project_dscription' => Yii::t('app', 'Project Dscription'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectsubs()
    {
        return $this->hasMany(Projectsub::className(), ['project_id' => 'id']);
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
