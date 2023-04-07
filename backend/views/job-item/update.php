<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\JobItem $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Job Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-item-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
