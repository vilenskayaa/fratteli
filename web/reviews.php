<?php

session_start();
$page_title = 'Отзывы';

if (!$_SESSION['user']) {
  $disabled = "disabled";
}
?>

<?php include "../layout/meta.php"; ?>


<body>
<?php include "../layout/side-menu.php" ?>
    <div class="wrapper">
    <main class="container container__aside">
      <div class="head">
      <div class="head__info">
        <div class="head__title">Настройки</div>
        <div class="head__subtitle">Ты всегда сможешь изменить имя пользователя, а также отправить отзыв о "Fratteli"</div>
      </div>
    </div>

      <section class="main__content">
        <div class="main__content__block">
          <h2>Сменить имя пользователя</h2>
          <form class="form rename" action="" id="rename">
        <div class="form__fields">
          <div class="form__item">
            <input class="form__input name" name="name" type="text" placeholder="Новое имя пользователя" required>
          </div>
        </div>
        <button type="button" class="form__btn" id="renameButton">
          Сохранить
        </button>
      </form>
        </div>
        <div class="main__content__block">
          <h2> Оставить отзыв</h2>
          <form action="" method="" class="reviews__form">
            <textarea class="reviews__textarea" name="reviews_text" rows="6" placeholder="Напишите здесь что-нибудь приятное" required <?=$disabled?>></textarea>
                  <button type="submit" class="form__btn" id="reviewsAddButton">
                    Оставить отзыв
                  </button>
                </form>
        </div>
        <div class="reviews__list" id="reviews">
      
      </div>
      </section>

  
    



  </main>
  </div>
  <script src="../js/jquery.js"></script>
  <script src="../js/reviews.js"></script>
</body>

</html>