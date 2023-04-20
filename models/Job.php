<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property int|null $ticket_id ใบแจ้งงาน
 * @property string|null $job_discrption รายละเอียด
 * @property string|null $job_request_at วันที่ร้องขอ
 * @property string|null $job_broken_at วันที่เสีย
 * @property int|null $job_quantity จำนวน
 * @property string|null $job_remask หมายเหตุ
 * @property int|null $job_location_id
 * @property string|null $job_image รูปภาพ
 * @property int|null $job_status_id
 *
 * @property JobStatus $jobStatus
 * @property Location $jobLocation
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id', 'job_quantity', 'job_location_id', 'job_status_id'], 'integer'],
            [['job_discrption', 'job_remask', 'job_image'], 'string', 'max' => 200],
            [['job_request_at', 'job_broken_at'], 'string', 'max' => 45],
            [['job_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobStatus::class, 'targetAttribute' => ['job_status_id' => 'id']],
            [['job_location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::class, 'targetAttribute' => ['job_location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ticket_id' => Yii::t('app', 'ใบแจ้งงาน'),
            'job_discrption' => Yii::t('app', 'รายละเอียด'),
            'job_request_at' => Yii::t('app', 'วันที่ร้องขอ'),
            'job_broken_at' => Yii::t('app', 'วันที่เสีย'),
            'job_quantity' => Yii::t('app', 'จำนวน'),
            'job_remask' => Yii::t('app', 'หมายเหตุ'),
            'job_location_id' => Yii::t('app', 'สถานที่'),
            'job_image' => Yii::t('app', 'รูปภาพ'),
            'job_status_id' => Yii::t('app', 'สถานะ'),
        ];
    }

    /**
     * Gets query for [[JobStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobStatus()
    {
        return $this->hasOne(JobStatus::class, ['id' => 'job_status_id']);
    }

    /**
     * Gets query for [[JobLocation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobLocation()
    {
        return $this->hasOne(Location::class, ['id' => 'job_location_id']);
    }
}
