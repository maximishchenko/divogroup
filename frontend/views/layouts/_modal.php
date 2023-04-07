

<div class="graph-modal">
  <div class="graph-modal__container" role="dialog" aria-modal="true" data-graph-target="feedback">
    <button class="btn-reset graph-modal__close js-modal-close" aria-label="Закрыть модальное окно">
      <span class="cross"></span>
    </button>
    <div class="graph-modal__content">
      <form action="" class="feedback-form">
        <span class="feedback-form__title">Оставьте свои контакты и мы свяжемся с вами</span>
        <input class="input-reset feedback-form__inp" type="text" placeholder="Ваше Имя">
        <input class="input-reset feedback-form__inp tel" type="tel" placeholder="Ваш телефон">
        <textarea class="input-reset feedback-form__area" name="comment" id="" cols="30" rows="5"
          placeholder="Комментарий"></textarea>
        <div class="feedback-form__row">
          <div class="feedback-form__politics">
            <input type="checkbox" id="feedback__checkbox" class="feedback-form__checkbox">
            <label for="feedback__checkbox">
              Нажимая, вы соглашаетесь на обработку <a class="feedback-form__politic-link" href="#">Персональных
                данных</a>
            </label>
          </div>
          <button class="btn-reset button-second" type="button">Отправить</button>
        </div>
      </form>
    </div>
  </div>
</div>
<button class="btn-reset feedback-mob-button feedback" type="button">
Связаться с нами
<svg class="send-ic">
    <use xlink:href="img/sprite.svg#arrow"></use>
</svg>
</button>