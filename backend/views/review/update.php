<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Review $model */

$this->title = Yii::t('app', 'Update Review: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
