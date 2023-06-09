<?php

use backend\models\Article;
use yii\helpers\Html;

?>
<div class="cards__el" style="background-image: url(<?= Article::UPLOAD_PATH . $article->image; ?>);">
    <div class="cards__el-wrapper">
      <h3 class="cards__el-title">
        <?= $article->title; ?>
      </h3>
      <ul class="list-reset cards__el-list">
        <?= $article->subtitle; ?>
      </ul>
    </div>
    <div class="cards__el-control">
      <button class="btn-reset cards__el-btn" type="button">
        <span class="cross"></span>
      </button>
    </div>
    <div class="cards__el-hide">
      <div class="text" data-simplebar>
        <?= Html::decode($article->description); ?>
      </div>
    </div>
</div>