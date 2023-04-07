<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\JobItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="job-item-form">

    <?php $form = ActiveForm::begin([
        'id' => 'job-item-form',
    ]); ?>
    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'sort')->textInput() ?>
                <?= $form->field($model, 'status')->checkbox() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'job-item-form']); ?>
