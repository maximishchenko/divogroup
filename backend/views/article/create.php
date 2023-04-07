<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Article $model */

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
