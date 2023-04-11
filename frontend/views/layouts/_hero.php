<?php

use frontend\models\Contact;
use yii\helpers\Html;
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
            <div class="hero__input-wrapper">
                <?= Html::activeInput('text', $contact, 'phone', ['template' => '{input}', 'id' => "transfer__inp", 'class' => "input-reset hero__input tel", 'placeholder' => "+7 (999) 999-99-99", 'type' => 'tel', 'data-tel-input' => '']) ?>
                <?= Html::button("Начать", ['class' => 'btn-reset button-pr feedback', "id" => "transfer__btn"])?>
            </div>
      </div>
    </div>
    <div class="hero__img-wrapper">
        <img class="parallax" src="img/hero.jpg" alt="">
    </div>
</section>