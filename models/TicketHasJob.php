<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_has_job".
 *
 * @property int $ticket_id
 * @property int $job_id
 *
 * @property Job $job
 * @property Ticket $ticket
 */
class TicketHasJob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket_has_job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id', 'job_id'], 'required'],
            [['ticket_id', 'job_id'], 'integer'],
            [['ticket_id', 'job_id'], 'unique', 'targetAttribute' => ['ticket_id', 'job_id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'id']],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ticket::className(), 'targetAttribute' => ['ticket_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ticket_id' => Yii::t('app', 'Ticket ID'),
            'job_id' => Yii::t('app', 'Job ID'),
        ];
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'job_id']);
    }

    /**
     * Gets query for [[Ticket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Ticket::className(), ['id' => 'ticket_id']);
    }
}
