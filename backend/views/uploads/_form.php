<?php

use backend\models\Uploads;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\DetailView;
use backend\traits\fileTrait;

/** @var yii\web\View $this */
/** @var backend\models\Uploads $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="uploads-form">

    <?php $form = ActiveForm::begin([
        'id' => 'uploads-form',
    ]); ?>
    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'fileItem', ['template' => '{label}<br/> {input} {error}'])->fileInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'sort')->textInput() ?>
                <?= $form->field($model, 'status')->checkbox() ?>
            </div>
        </div>
    </div>

    <?php if (!$model->isNewRecord && isset($model->file_name) && !empty($model->file_name)): ?>

        <div class="jumbotron">
            <div class="row">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'file_name',
                        'format' => 'raw',
                        'value' => function($model) {
                            $file = fileTrait::$frontendPath . Uploads::UPLOAD_PATH . $model->file_name;
                            return Html::a($model->file_name, $file, ['target' => '_blank']);
                        }
                    ],
                    'file_ext',
                    'file_size',
                ],
            ]) ?>
        </div>
    </div>
    <?php endif; ?>
    <?php ActiveForm::end(); ?>

</div>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'uploads-form']); ?>