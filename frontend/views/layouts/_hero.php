<?php

use frontend\models\Contact;
use yii\helpers\Html;

$contact = new Contact();
?>

<section class="hero">
    <div class="container">
        <div class="hero__wrapper">
            <h1 class="centered hero__title section-title">
                Ваш помощник в сдаче недвижимости в аренду в <b class="mark">Сочи</b>
            </h1>
            <p class="centered hero__des section-des">
                Находим для вас выгодные условия для сдачи квартиры и сопровождаем весь процесс ОТ и ДО
            </p>
            <div class="hero__input-wrapper">
                <?= Html::activeInput('text', $contact, 'phone', ['data-input-keyup' => '', 'id' => "transfer__inp", 'class' => "input-reset hero__input tel", 'placeholder' => "+7 (999) 999-99-99", 'type' => 'tel', 'data-tel-input' => '']) ?>
                <?= Html::button("Начать", ['class' => 'btn-reset button-pr feedback', "id" => "transfer__btn"]) ?>
            </div>
        </div>
    </div>
    <div class="hero__img-wrapper">
        <img class="parallax" src="img/hero.jpg" alt="">
    </div>
</section>
