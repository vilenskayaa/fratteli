<?php

session_start();
$page_title = "Стикеры"

?>

<?php include "../layout/meta.php"; ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/css/stickers.css">
  <link rel="stylesheet" href="/styles/css/components/popup.css">

</head>

<body>
  <?php include "../layout/side-menu.php" ?>

  <div class="wrapper">
    <main class="container container__aside">
      <div class="main__title">
        <h1 class="title__text">Стикеры</h1>
        <p class="main__title__text">
          Тут будут слова, отмеченные вами и собранные в одном месте
        </p>
      </div>
      <section class="selected">
        <div class="selected__title">
          <h2>Избранные</h2>
          <img src="/assets/icons/like--blue.svg" alt="">
        </div>
        <div class="selected__cards">
          <div class="selected__cards__item">
            <img src="/assets/img/stickers/sticker1.png" alt="">
            <p class="title__text">Sedia</p>
            <p class="main__title__text">
              стул
            </p>
            <button class="like__btn">
              <img src="/assets/icons/like--blue.svg" alt="">
            </button>
          </div>
          <div class="selected__cards__item">
            <img src="/assets/img/stickers/sticker2.png" alt="">
            <p class="title__text">Cane</p>
            <p class="main__title__text">
              собака
            </p>
            <button class="like__btn">
              <img src="/assets/icons/like--blue.svg" alt="">
            </button>
          </div>
          <div class="selected__cards__item">
            <img src="/assets/img/stickers/sticker3.png" alt="">
            <p class="title__text">Gatto</p>
            <p class="main__title__text">
              Кот
            </p>
            <button class="like__btn">
              <img src="/assets/icons/like--blue.svg" alt="">
            </button>
          </div>
          <div class="selected__cards__item">
            <img src="/assets/img/stickers/sticker4.png" alt="">
            <p class="title__text">Cielo</p>
            <p class="main__title__text">
              Небо
            </p>
            <button class="like__btn">
              <img src="/assets/icons/like--blue.svg" alt="">
            </button>
          </div>
          
        </div>
      </section>
    </main>
    
  </div>
  <script src="/js/popup.js"></script>
</body>

</html>