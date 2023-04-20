<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = Yii::t('app', 'Update Ticket: {name}', [
    'name' => $modelTicket->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelTicket->id, 'url' => ['view', 'id' => $modelTicket->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
         'modelTicket' => $modelTicket,
         'modelsJob' =>$modelsJob,
    ]) ?>

</div>
