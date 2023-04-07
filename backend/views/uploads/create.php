<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Uploads $model */

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uploads-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
