<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Apartments $model */

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Apartments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
