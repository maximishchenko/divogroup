<?php

use backend\models\Uploads;
use backend\widgets\LinkColumn;
use backend\widgets\ListButtonsWidget;
use backend\widgets\SetColumn;
use common\models\Status;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\traits\fileTrait;

/** @var yii\web\View $this */
/** @var backend\models\search\UploadsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Uploads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uploads-index">

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
                'attribute' => 'name',
                'contentOptions' => ['class' => 'text-wrap'],
                'headerOptions' => array(
                    'class' => 'sort-numerical',
                ),
            ],
            'file_ext',
            'file_size',
            // 'file_name',
            [
                'attribute' => 'file_name',
                'format' => 'raw',
                'value' => function($data) {
                    $file = fileTrait::$frontendPath . Uploads::UPLOAD_PATH . $data->file_name;
                    return Html::a($data->file_name, $file, ['target' => '_blank']);
                }
            ],
            'sort',
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
