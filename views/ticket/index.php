<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tickets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ticket'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ticket_number',
            'ticket_date',
            'ticket_title',
            'ticket_description:ntext',
            //'ticket_requester_id',
            //'ticket_department_id',
            //'ticket_remask',
            //'ticket_ref',
            //'ticket_progress',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            //'jobs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
