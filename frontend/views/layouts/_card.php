<section class="cards mt-xxl">
    <div class="container">
      <div class="cards__wrapper">
        <div class="section-head">
          <h2 class="centered section-title cards__title">
            С нами сдавать квартиру просто
          </h2>
          <p class="centered section-des cards__des">
            С 2015 года мы стараемся сделать лучший сервис для сдачи квартир. В каких
            случаях наши услуги могут быть полезны?
          </p>
        </div>

        <?php foreach ($articles as $key => $article): ?>
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
                  
        <?php if (($key + 1) % 2 == 0): ?>
          </div>
        <?php endif; ?>

        <?php endforeach; ?>
      </div>
    </div>
</section>
