<?php

use backend\models\Apartments;
use backend\widgets\SingleImagePreviewWidget;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Apartments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="apartments-form">

<?php $form = ActiveForm::begin([
        'id' => 'apartments-form',
    ]); ?>
    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'status')->checkbox() ?>
                <?= $form->field($model, 'imageFile', ['template' => '{label}<br/> {input} {error}'])->fileInput() ?>
                <?php if(isset($model->image) && !empty($model->image)): ?>
                    <div class="row">
                        <?= SingleImagePreviewWidget::widget([
                            'id' => $model->id,
                            'filePath' => $model->getUrl(Apartments::UPLOAD_PATH, $model->image),
                            'url' => 'delete-image',
                            'fancyboxGalleryName' => "SingleCategoryImage",
                        ]); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'rooms_amount')->textInput(['type' => 'number']) ?>
                <?= $form->field($model, 'square')->textInput() ?>
                <?= $form->field($model, 'sort')->textInput() ?>
            </div>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'apartments-form']); ?>
