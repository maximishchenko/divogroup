<?php

use backend\models\Contact;
use backend\widgets\LinkColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\Contact $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Refresh Page'), ['index'], ['class' => 'btn btn-info btn-sm']) ?>
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
                'attribute' => 'phone',
                'contentOptions' => ['class' => 'text-wrap'],
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a($data->phone, ['view', 'id' => $data->id], []);
                }
            ],
            'name',
            'comment:ntext',
            'created_at:datetime',
            [
                'class' => ActionColumn::className(),
                'contentOptions' => ['style' => 'width:80px;'],
                'template' => '{delete}',
            ],
        ],
    ]); ?>


</div>
