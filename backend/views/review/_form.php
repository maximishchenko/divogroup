<?php

use backend\models\Review;
use backend\widgets\SingleImagePreviewWidget;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Review $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-form">

<?php $form = ActiveForm::begin([
        'id' => 'review-form',
    ]); ?>
    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'sort')->textInput() ?>
                <?= $form->field($model, 'status')->checkbox() ?>
                <?= $form->field($model, 'imageFile', ['template' => '{label}<br/> {input} {error}'])->fileInput() ?>
                <?php if(isset($model->image) && !empty($model->image)): ?>
                    <div class="row">
                        <?= SingleImagePreviewWidget::widget([
                            'id' => $model->id,
                            'filePath' => $model->getUrl(Review::UPLOAD_PATH, $model->image),
                            'url' => 'delete-image',
                            'fancyboxGalleryName' => "SingleCategoryImage",
                        ]); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="form-group field-review-review_date">
                    <label for="review-review_date"><?= $model->getAttributeLabel('review_date_item'); ?></label>
                    <?=  \yii\jui\DatePicker::widget([
                        'model' => $model,
                        'attribute' => 'review_date_item',
                        'options' => [
                            'class' => 'form-control',
                        ],
                        'language' => 'ru',
                        'dateFormat' => 'dd.MM.yyyy',
                    ]); ?>
                </div>
                <?= $form->field($model, 'review')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= $this->render('//layouts/forms/_buttons', ['formId' => 'review-form']); ?>