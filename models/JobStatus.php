<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_status".
 *
 * @property int $id
 * @property string|null $status_code รหัส
 * @property string|null $status_name ชื่อสถานะ
 * @property string|null $color สี
 *
 * @property Job[] $jobs
 */
class JobStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_code'], 'string', 'max' => 45],
            [['status_name'], 'string', 'max' => 200],
            [['color'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status_code' => Yii::t('app', 'รหัส'),
            'status_name' => Yii::t('app', 'ชื่อสถานะ'),
            'color' => Yii::t('app', 'สี'),
        ];
    }

    /**
     * Gets query for [[Jobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['job_status_id' => 'id']);
    }
}
