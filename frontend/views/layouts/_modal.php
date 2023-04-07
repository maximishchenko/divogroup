<?php

use frontend\models\Contact;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$contact = new Contact();
?>

<div class="graph-modal" id="contact_modal">
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="feedback">
    <button class="btn-reset graph-modal__close js-modal-close" aria-label="Закрыть модальное окно">
      <span class="cross"></span>
    </button>
    <div class="graph-modal__content">

    <?php $form = ActiveForm::begin([
            'id' => 'feedback_form_modal',
            'action' => ['/contact'],
            'method' => 'post',
            'options' => [
                'class' => "feedback-form",
                'autocomplete' => 'off',
            ]
        ]); ?>

        <span class="feedback-form__title">Оставьте свои контакты и мы свяжемся с вами</span>
        
        <?= $form->field($contact, 'name', ['template' => '{input}', 'options' => ['tag' => false]])->textInput(['class' => "input-reset feedback-form__inp", 'placeholder' => "Ваше имя", 'type' => 'text']); ?>
        <?= $form->field($contact, 'phone', ['template' => '{input}', 'options' => ['tag' => false]])->textInput(['class' => "input-reset feedback-form__inp", 'placeholder' => "Ваш телефон", 'type' => 'tel', 'data-tel-input' => '']); ?>
        <?= $form->field($contact, 'comment', ['template' => '{input}', 'options' => ['tag' => false]])->textarea(['cols' => '30', 'rows' => '5', 'class' => "input-reset feedback-form__area", 'placeholder' => "Комментарий"]); ?>

        <div class="feedback-form__row">

            <div class="feedback-form__politics">
                
                <?= $form->field($contact, 'agreement', ['template' => '{input}', 'options' => ['tag' => false]])->checkbox(['id' => 'feedback__checkbox', 'class' => 'feedback-form__checkbox feedback-form__checkbox_modal'], false); ?>
                <label for="feedback__checkbox">
                    Нажимая, вы соглашаетесь на обработку <a class="feedback-form__politic-link" href="<?= Url::toRoute('/policy'); ?>">Персональных
                    данных</a>
                </label>
            </div>
            
          <?= Html::submitButton('Отправить', ['class' => 'btn-reset button-second', 'id' => 'callback_submit_btn_modal', 'disabled' => true])?>
        </div>
      <?php ActiveForm::end(); ?>



    </div>
  </div>
</div>
<button class="btn-reset feedback-mob-button feedback" type="button">
Связаться с нами
<svg class="send-ic">
    <use xlink:href="img/sprite.svg#arrow"></use>
</svg>
</button>