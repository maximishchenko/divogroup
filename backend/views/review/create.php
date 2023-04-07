<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Review $model */

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
