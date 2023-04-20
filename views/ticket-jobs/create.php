<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TicketJobs */

$this->title = Yii::t('app', 'Create Ticket Jobs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-jobs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
