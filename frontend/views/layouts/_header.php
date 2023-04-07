
    <div class="container">
      <div class="header__wrapper">
        <a href="<?= Yii::$app->homeUrl; ?>" class="header__logo">
          <img src="img/logo.svg" alt="svg">
        </a>

        <div class="header__links">
          <a class="header__phone link" href="tel:<?= str_replace(" ", "", Yii::$app->configManager->getItemValue('contactPhone')); ?>">
            <span class="header__phone-icon">
              <svg class="call-i">
                <use xlink:href="img/sprite.svg#call"></use>
              </svg>
            </span>
            <span class="header__phone-num">
              <?= Yii::$app->configManager->getItemValue('contactPhone'); ?>
            </span>
          </a>
          <button type="button" class="feedback button-pr btn-reset">Связаться с нами</button>
        </div>
      </div>
    </div>