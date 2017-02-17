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
}
