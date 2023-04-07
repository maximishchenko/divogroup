<?php

use backend\models\Review;
?>
<!-- <div class="swiper-slide"> -->
  <div class="reviews__el">
    <div class="reviews__title">
      <span class="reviews__img" style="background-image: url('<?= Review::UPLOAD_PATH . $model->image; ?>');"></span>
      <div class="reviews__head">
        <span class="reviews__autor">
            <?= $model->name; ?>
        </span>
        <span class="reviews__date"><?= Yii::$app->formatter->asDate($model->review_date, "d MMMM Y"); ?></span>
      </div>
    </div>
    <p class="reviews__content">
        <?= $model->review; ?>
    </p>
  </div>
<!-- </div> -->