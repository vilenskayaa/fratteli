<?php

session_start();
$page_title = 'Вcе отзывы';

if (!$_SESSION['user']) {
  $disabled = "disabled";
}
?>

<?php include "../layout/meta.php"; ?>
<link href="/styles/css/reviews.css" rel="stylesheet"/>


<body>
<?php include "../layout/side-menu.php" ?>
    <div class="wrapper">
    <main class="container container__aside">
      <div class="head">
      <div class="head__info">
        <div class="head__title"> Отзывы пользователей</div>
        <div class="head__subtitle">Здесь можно просмотреть все отзывы пользователей</div>
      </div>
    </div>

      <section class="main__content">
       
       
        <div class="reviews__list" id="reviews">
      </div>
      </section>

  
    



  </main>
  </div>
  <script src="../js/jquery.js"></script>
  <script src="../js/reviews.js"></script>
</body>

</html>