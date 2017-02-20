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
            [['projectsub_number', 'project_id'], 'integer'],
            [['projectsub_dscription', 'project_dscription'], 'string', 'max' => 225],
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
}
