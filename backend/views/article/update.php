<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Article $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>
<div class="article-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
