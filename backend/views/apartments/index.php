<?php

use backend\models\Apartments;
use backend\widgets\LinkColumn;
use backend\widgets\ListButtonsWidget;
use backend\widgets\SetColumn;
use common\models\Status;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\search\ApartmentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Apartments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-index">

    <p class="text-right">
        <?= ListButtonsWidget::widget() ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
            [
                'class' => LinkColumn::className(),
                'attribute' => 'address',
                'contentOptions' => ['class' => 'text-wrap'],
                'headerOptions' => array(
                    'class' => 'sort-numerical',
                ),
            ],
            'price',
            'rooms_amount',
            'square',
            [
                'attribute' => 'sort',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
            [
                'class' => SetColumn::className(),
                'filter' => Status::getStatusesArray(),
                'attribute' => 'status',
                'name' => function($data) {
                    return ArrayHelper::getValue(Status::getStatusesArray(), $data->status);
                },
                'contentOptions' => ['style' => 'width:100px;'],
                'cssCLasses' => [
                    Status::STATUS_ACTIVE => 'success',
                    Status::STATUS_BLOCKED => 'danger',
                ],
            ],
            [
                'class' => ActionColumn::className(),
                'contentOptions' => ['style' => 'width:80px;'],
                'template' => '{delete}',
            ],
        ],
    ]); ?>


</div>
