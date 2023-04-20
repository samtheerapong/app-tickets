<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_id') ?>

    <?= $form->field($model, 'job_discrption') ?>

    <?= $form->field($model, 'job_request_at') ?>

    <?= $form->field($model, 'job_broken_at') ?>

    <?php // echo $form->field($model, 'job_quantity') ?>

    <?php // echo $form->field($model, 'job_remask') ?>

    <?php // echo $form->field($model, 'job_location_id') ?>

    <?php // echo $form->field($model, 'job_image') ?>

    <?php // echo $form->field($model, 'job_status_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
