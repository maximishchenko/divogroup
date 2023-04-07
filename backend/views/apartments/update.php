<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Apartments $model */

$this->title = Yii::t('app', 'Update Apartments: {name}', [
    'name' => $model->address,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apartments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
