<?php
use yii\widgets\ListView;
?>
<section class="reviews ptb-xxl" id="reviews">
    <div class="container">
      <div class="reviews__wrapper">
        <h2 class="section-title">Посмотрите отзывы наших клиентов</h2>
        <div class="swiper reviews-swiper">
          <div class="swiper-button-next reviews-btn-next"></div>
          <div class="swiper-button-prev reviews-btn-prev"></div>
          <div class="swiper-wrapper">
            
        <?= ListView::widget([
            'dataProvider' => $reviews,
            'itemView' => 'items/_reviews_items',
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
