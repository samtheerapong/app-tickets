<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;  // **** https://github.com/wbraganca/yii2-dynamicform  *****

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">


    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?> <!-- อย่าลืม dynamic-form -->

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($modelTicket, 'ticket_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($modelTicket, 'ticket_date')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($modelTicket, 'ticket_title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($modelTicket, 'ticket_description')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($modelTicket, 'ticket_requester_id')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($modelTicket, 'ticket_department_id')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($modelTicket, 'ticket_remask')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($modelTicket, 'ticket_ref')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <b><i class="glyphicon glyphicon-list"></i> รายการ</b>
        </div>
        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsJob[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'job_discrption',
                    'job_request_at',
                    'job_broken_at',
                    'job_quantity',
                    'job_remask',
                    'job_location_id',
                    'job_image',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsJob as $i => $modelJob) : ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">
                                งานที่
                            </h3>
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (!$modelJob->isNewRecord) {
                                echo Html::activeHiddenInput($modelJob, "[{$i}]id");
                            }
                            ?> <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelJob, "[{$i}]job_discrption")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-2">
                                    <?= $form->field($modelJob, "[{$i}]job_request_at")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-2">
                                    <?= $form->field($modelJob, "[{$i}]job_broken_at")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-2">
                                    <?= $form->field($modelJob, "[{$i}]job_quantity")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelJob, "[{$i}]job_location_id")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelJob, "[{$i}]job_remask")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?= $form->field($modelJob, "[{$i}]job_image")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div><!-- .row -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>