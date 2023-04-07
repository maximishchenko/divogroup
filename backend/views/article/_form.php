<?php

use backend\models\Article;
use backend\widgets\SingleImagePreviewWidget;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin([
        'id' => 'article-form',
    ]); ?>
    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'sort')->textInput() ?>
                <?= $form->field($model, 'status')->checkbox() ?>              
                <?= $form->field($model, 'imageFile', ['template' => '{label}<br/> {input} {error}'])->fileInput() ?>
                <?php if(isset($model->image) && !empty($model->image)): ?>
                    <div class="row">
                        <?= SingleImagePreviewWidget::widget([
                            'id' => $model->id,
                            'filePath' => $model->getUrl(Article::UPLOAD_PATH, $model->image),
                            'url' => 'delete-image',
                            'fancyboxGalleryName' => "SingleCategoryImage",
                        ]); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'subtitle')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?= $this->render('//layouts/forms/_buttons', ['formId' => 'article-form']); ?>