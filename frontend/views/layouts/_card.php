<section class="cards mt-xxl">
  <div class="container">
    <div class="cards__wrapper">
      <div class="section-head">
        <h2 class="centered section-title cards__title">
          С нами сдавать квартиру просто и выгодно
        </h2>
        <p class="centered section-des cards__des">
          Наш сервис работает с 2015. За это время мы сформировали обширную базу контактов, проверенную команду и репутацию надежного партнера по работе с недвижимостью.
        </p>
      </div>

      <?php foreach ($articles as $key => $article) : ?>
        <?php

        $i = 0;
        if ($key % 2 == 0) {
          $i = $i + 1;
          if ($key == 0 || $i % 2 == 0) {
            $class = "mb-m";
          } else {
            $class = "cards__grid--inv";
          } ?>
          <div class="cards__grid <?= $class; ?>">
          <? } ?>
          <?= $this->render('//layouts/items/_article_items', ['article' => $article]); ?>

          <?php if (($key + 1) % 2 == 0) : ?>
          </div>
        <?php endif; ?>

      <?php endforeach; ?>
    </div>
  </div>
</section>
