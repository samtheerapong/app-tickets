<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_id')->textInput() ?>

    <?= $form->field($model, 'job_discrption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_request_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_broken_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_quantity')->textInput() ?>

    <?= $form->field($model, 'job_remask')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_location_id')->textInput() ?>

    <?= $form->field($model, 'job_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_status_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
