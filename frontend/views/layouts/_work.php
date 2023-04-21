<?php
use yii\widgets\ListView;
?>
<section class="works mt-xxl ptb-xxl">
    <div class="container">
      <div class="section-head">
        <h2 class="centered section-title cards__title">Как мы работаем?</h2>
        <p class="centered section-des cards__des">
        Наша цель — счастливые жильцы и спокойные владельцы объектов недвижимости. Мы помогаем решить задачи каждого и сохранить комфортную коммуникацию.</p>
      </div>
      <div class="works__wrapper">


        <?= ListView::widget([
            'dataProvider' => $jobItems,
            'itemView' => 'items/_job_items',
            'layout' => "{items}\n{pager}",
            'options' => [
                'tag' => false,
            ],
            'pager'=>[
                'options'=>[
                    'class'=>'paginator',
              'style' => "display: none"
                ]
            ],
        ]) ?>

      </div>
    </div>
</section>
