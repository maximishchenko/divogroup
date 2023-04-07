<?php

use yii\helpers\Url;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Настройки',
                'text' => 'Управление настройками приложения',
                'linkUrl' => Url::toRoute("/settings"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'danger'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Обратная связь',
                'text' => 'Данные заполненных форм обратной связи',
                'linkUrl' => Url::toRoute("/contact"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'success'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Как мы работаем',
                'text' => 'Содержимое раздела "Как мы работаем"',
                'linkUrl' => Url::toRoute("/job-item"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'warning'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Квартиры',
                'text' => 'Содержимое раздела "Квартиры"',
                'linkUrl' => Url::toRoute("/apartments"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'warning'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Отзывы',
                'text' => 'Добавление отзывов',
                'linkUrl' => Url::toRoute("/review"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'warning'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Статьи',
                'text' => 'Управление содержимым статей',
                'linkUrl' => Url::toRoute("/article"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'warning'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Файлы',
                'text' => 'Загрузка файлов',
                'linkUrl' => Url::toRoute("/uploads"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'warning'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Скрипты',
                'text' => 'Подключаемые скрипты',
                'linkUrl' => Url::toRoute("/script"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'info'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'robots.txt',
                'text' => 'Файл robots.txt',
                'linkUrl' => Url::toRoute("/robots"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'info'
            ]) ?>
        </div>
    </div>
</div>