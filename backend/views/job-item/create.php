<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\JobItem $model */

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Job Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
