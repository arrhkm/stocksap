<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transcode".
 *
 * @property int $id
 * @property string $transcode_name
 * @property string $transcode_dscription
 */
class Transcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transcode_dscription'], 'string'],
            [['transcode_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'transcode_name' => Yii::t('app', 'Transcode Name'),
            'transcode_dscription' => Yii::t('app', 'Transcode Dscription'),
        ];
    }
}
