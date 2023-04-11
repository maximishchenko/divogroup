<?php

use frontend\models\Contact;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$contact = new Contact();
?>

<div class="container">
    <h2 class="section-title centered">Оставьте свои контакты<br> и мы свяжемся с вами</h2>
    <div class="footer__wrapper">

        <?php $form = ActiveForm::begin([
            'id' => 'feedback_form',
            'action' => ['/contact'],
            'method' => 'post',
            'options' => [
                'class' => "feedback-form",
                'autocomplete' => 'off',
            ]
        ]); ?>

        <?= $form->field($contact, 'name', ['template' => '{input}', 'options' => ['tag' => false]])->textInput(['id' => false, 'class' => "input-reset feedback-form__inp", 'placeholder' => "Ваше имя", 'type' => 'text']); ?>
        <?= $form->field($contact, 'phone', ['template' => '{input}', 'options' => ['tag' => false]])->textInput(['id' => false, 'class' => "input-reset feedback-form__inp", 'placeholder' => "Ваш телефон", 'type' => 'tel', 'data-tel-input' => '']); ?>
        <?= $form->field($contact, 'comment', ['template' => '{input}', 'options' => ['tag' => false]])->textarea(['id' => false, 'cols' => '30', 'rows' => '5', 'class' => "input-reset feedback-form__area", 'placeholder' => "Комментарий"]); ?>

        <div class="feedback-form__row">
            <div class="feedback-form__politics">
                
                <?= $form->field($contact, 'agreement', ['template' => '{input}', 'options' => ['tag' => false]])->checkbox([
                            'id' => 'feedback__checkbox-f',
                            'class' => 'feedback-form__checkbox',
                            'data-agreement-checkbox' => '',
                        ], false); ?>
                <label for="feedback__checkbox-f">
                    Нажимая, вы соглашаетесь на обработку <a class="feedback-form__politic-link politics" href="javascript:void(0);">Персональных
                    данных</a>
                </label>
            </div>
            <?= Html::submitButton('Отправить', ['class' => 'btn-reset button-second', 'id' => 'callback_submit_btn', 'disabled' => true])?>
        </div>
        <?php ActiveForm::end(); ?>


        <div class="footer__contact">
        <span class="footer__contact-title">Или свяжитесь с нами</span>
        <div class="footer__contact-wrapper">
            <a class="footer__links footer__phone tel" href="tel:<?= str_replace(" ", "", Yii::$app->configManager->getItemValue('contactPhone')); ?>">
                <?= Yii::$app->configManager->getItemValue('contactPhone'); ?>
            </a>
            <a class="footer__links footer__mail" href="mailto://<?= Yii::$app->configManager->getItemValue('contactEmail'); ?>">
                <?= Yii::$app->configManager->getItemValue('contactEmail'); ?>
            </a>
            <div class="footer__soc">
            <a href="<?= Yii::$app->configManager->getItemValue('contactWA'); ?>">
                <svg class="watsap-i">
                    <use xlink:href="img/sprite.svg#wt"></use>
                </svg>
            </a>
            <a href="<?= Yii::$app->configManager->getItemValue('contactTG'); ?>">
                <svg class="">
                    <use xlink:href="img/sprite.svg#tl"></use>
                </svg>
            </a>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="footer__bot">
  <span>© <?= date('Y'); ?> DiVo group</span>
  <a href="javascript:void(0);" class="politics">Политика конфиденциальности</a>
</div>