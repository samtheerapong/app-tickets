<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string|null $location_name ชื่อสถานที่
 * @property int|null $location_main_id สถานที่หลัก
 * @property int|null $location_status สถานะ
 *
 * @property Job[] $jobs
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location_main_id', 'location_status'], 'integer'],
            [['location_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'location_name' => Yii::t('app', 'ชื่อสถานที่'),
            'location_main_id' => Yii::t('app', 'สถานที่หลัก'),
            'location_status' => Yii::t('app', 'สถานะ'),
        ];
    }

    /**
     * Gets query for [[Jobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['job_location_id' => 'id']);
    }
}
