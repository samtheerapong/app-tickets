<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_number') ?>

    <?= $form->field($model, 'ticket_date') ?>

    <?= $form->field($model, 'ticket_title') ?>

    <?= $form->field($model, 'ticket_description') ?>

    <?php // echo $form->field($model, 'ticket_requester_id') ?>

    <?php // echo $form->field($model, 'ticket_department_id') ?>

    <?php // echo $form->field($model, 'ticket_remask') ?>

    <?php // echo $form->field($model, 'ticket_ref') ?>

    <?php // echo $form->field($model, 'ticket_progress') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'jobs') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
