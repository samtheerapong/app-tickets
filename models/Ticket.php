<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property string|null $ticket_number เลขที่เอกสาร
 * @property string|null $ticket_date วันที่
 * @property string|null $ticket_title เรื่อง
 * @property string|null $ticket_description คำอธิบาย
 * @property int|null $ticket_requester_id ผู้ร้องขอ
 * @property int|null $ticket_department_id แจ้งไปยังแผนก
 * @property string|null $ticket_remask บันทึก
 * @property string|null $ticket_ref อ้างอิง
 * @property int|null $ticket_progress ความคืบหน้า
 * @property string|null $created_at สร้างเมื่อ
 * @property string|null $created_by สร้างโดย
 * @property string|null $updated_at ปรับปรุงเมื่อ
 * @property string|null $updated_by ปรับปรุงโดย
 * @property string|null $jobs
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_description'], 'string'],
            [['ticket_requester_id', 'ticket_department_id', 'ticket_progress'], 'integer'],
            [['ticket_number', 'ticket_date', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 45],
            [['ticket_title', 'ticket_remask', 'ticket_ref', 'jobs'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ticket_number' => Yii::t('app', 'เลขที่เอกสาร'),
            'ticket_date' => Yii::t('app', 'วันที่'),
            'ticket_title' => Yii::t('app', 'เรื่อง'),
            'ticket_description' => Yii::t('app', 'คำอธิบาย'),
            'ticket_requester_id' => Yii::t('app', 'ผู้ร้องขอ'),
            'ticket_department_id' => Yii::t('app', 'แจ้งไปยังแผนก'),
            'ticket_remask' => Yii::t('app', 'บันทึก'),
            'ticket_ref' => Yii::t('app', 'อ้างอิง'),
            'ticket_progress' => Yii::t('app', 'ความคืบหน้า'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_at' => Yii::t('app', 'ปรับปรุงเมื่อ'),
            'updated_by' => Yii::t('app', 'ปรับปรุงโดย'),
            'jobs' => Yii::t('app', 'Jobs'),
        ];
    }
}
