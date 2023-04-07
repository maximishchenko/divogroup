<?php
use yii\widgets\ListView;
?>
<section class="apartments">
    <div class="container">
      <div class="apartments__wrapper">
        <div class="apartments__head">
          <h2 class="centered section-title">Сданные квартиры</h2>
          <p class="centered section-des">Мы оцениваем квартиру и даем рекомендации собственнику по устранению
            недостатков в
            квартире</p>
        </div>
        <div class="swiper apartments-swiper">
          <div class="swiper-button-next apartments-btn-next"></div>
          <div class="swiper-button-prev apartments-btn-prev"></div>
          <div class="swiper-wrapper">
            

          <?= ListView::widget([
              'dataProvider' => $apartments,
              'itemView' => 'items/_apartment_items',
              'layout' => "{items}",
              'class'=>'swiper-slide',
              'itemOptions' => [
                'class'=>'swiper-slide',
              ],
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
      </div>
    </div>
</section>