<?php

use frontend\models\Contact;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$contact = new Contact();
?>

<section class="hero">
    <div class="container">
      <div class="hero__wrapper">
        <h1 class="centered hero__title section-title">
            Сдаем и сопровождаем квартиры в <b class="mark">Сочи</b>
        </h1>
        <p class="centered hero__des section-des">
            Сдавайте квартиру выгодно и получайте стабильный доход. Все заботы по сопровождению мы возьмем на себя.
        </p>
        <?php $form = ActiveForm::begin([
            'id' => 'hero_form',
            'action' => ['/contact'],
            'method' => 'post',
            'options' => [
                'class' => "callback__frm",
                'autocomplete' => 'off',
            ]
        ]); ?>
            <div class="hero__input-wrapper">
                <!-- <input class="input-reset hero__input tel" data-tel-input type="tel" placeholder="+7 (999) 999-99-99"> -->
                <!-- <button class="btn-reset button-pr" type="button">Начать</button> -->
                
                <?= $form->field($contact, 'phone', ['template' => '{input}'])->textInput(['class' => "input-reset hero__input tel", 'placeholder' => "+7 (999) 999-99-99", 'type' => 'tel', 'data-tel-input' => '']) ?>
                <?= Html::submitButton('Начать', ['class' => 'btn-reset button-pr'])?>
            </div>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
    <div class="hero__img-wrapper">
        <img class="parallax" src="img/hero.jpg" alt="">
    </div>
</section>