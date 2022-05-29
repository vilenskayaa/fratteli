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
  <main class="reviews container__aside">
    <div class="head__info">
        <div class="head__title">
          <span id="headTitle">Отзывы о Fratteli</span>
        </div>
        <div class="head__subtitle head__subtitle-600">Отставьте свой отзыв или прочтите отзывы других</div>
      </div>
    <form action="" method="" class="reviews__form">
      <textarea class="reviews__textarea" name="reviews_text" rows="8" required <?=$disabled?>></textarea>
      <button type="submit" class="form__btn" id="reviewsAddButton">
        Оставить отзыв
      </button>
    </form>
    <div class="reviews__list" id="reviews">
      
    </div>
  </main>
  <script src="../js/jquery.js"></script>
  <script src="../js/reviews.js"></script>
</body>

</html>