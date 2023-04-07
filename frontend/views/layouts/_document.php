<?php
use backend\models\Uploads;
?>

<section class="doc-info ptb-xxl">
    <div class="container">
      <div class="doc-info__wrapper">
        <div class="doc-info__content">
          <h2 class="section-title">Подписываем договор</h2>
          <p class="section-des">Оформление документов и передача квартиры займет не более часа. Ознакомьтесь с
            проектом договора и
            нотариальной доверенностью прямо сейчас:</p>
          <div class="doc-info__links">
            <?php foreach ($documents as $key => $document): ?>
              <?php $buttonClass = ($key !== 0 || $key%2!=0) ? 'button-third' : 'button-second'  ?>
              <?php $svgClass = ($key !== 0 && $key%2!=0) ? 'ic-download' : 'ic-download ic-download--inv'  ?>
                
              <a class="<?= $buttonClass; ?>" href="<?= Uploads::UPLOAD_PATH . $document->file_name; ?>" target="_blank">
                <svg class="<?= $svgClass; ?>">
                  <use xlink:href="img/sprite.svg#download"></use>
                </svg>
                <span class="link-title"><?= $document->name; ?><span class="link-title__sub"><?= $document->file_ext; ?>, <?= $document->file_size; ?></span></span>
              </a>

            <?php endforeach; ?>
          </div>
        </div>
        <div class="doc-info__img-wrapper">
          <picture>
            <source srcset="img/doc.avif" type="image/avif">
            <source srcset="img/doc.webp" type="image/webp">
            <img src="img/doc.png" class="image" width="" height="" alt="">
          </picture>
        </div>
      </div>
    </div>
</section>