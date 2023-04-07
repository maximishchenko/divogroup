<?php

use backend\models\Apartments;
use frontend\models\Plural;
?>
<div class="swiper-slide">
  <div class="apartments__el">
    <picture>
      <!-- <source srcset="img/par2.avif" type="image/avif">
      <source srcset="img/par2.webp" type="image/webp"> -->
      <img src="<?= Apartments::UPLOAD_PATH . $model->image?>" class="image" width="" height="" alt="<?= $model->address; ?>">
    </picture>
    <div class="apartments__title">
      <span>
        <?= $model->address; ?><br>
        <?= Yii::$app->formatter->asCurrency($model->price); ?></span>
      <span><?= Plural::num_word($model->rooms_amount, ["комната", "комнаты", "комнат"]) ?> , <?= $model->square; ?> м<sup>2</sup></span>
    </div>
  </div>
</div>