<?php

session_start();
$page_title = "Библиотека"

?>

<?php include "../layout/meta.php"; ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../styles/css/library.css" rel="stylesheet"/>

</head>
<body>
  <?php include "../layout/side-menu.php" ?>
    <div class="wrapper">

    <main class="container container__aside">
  
      <div class="head">
      <div class="head__info">
        <div class="head__title">Библиотека</div>
        <div class="head__subtitle">Здесь только самые интересные материалы для изучения итальянского</div>
      </div>
    </div>
      <section class="main__content">
        <div class="main__content__block">
          <h2>Читальный зал</h2>
          <div class="block__cards">
            <div class="block__cards__item">
              <img src="/assets/img/library/book1.png" alt="">
              <button class="download__btn" onclick="download('assets/books/cera_and_volte_adesso.pdf')"><img src="../assets/icons/Download.svg" alt=""></button>
            </div>
            <div class="block__cards__item">
              <img src="/assets/img/library/book2.png" alt="">
              <button class="download__btn" onclick="download('assets/books/i capolavori.pdf')"><img src="../assets/icons/Download.svg" alt=""></button>
            </div>
            <div class="block__cards__item">
              <img src="/assets/img/library/book3.png" alt="">
              <button class="download__btn" onclick="download('assets/books/il libro della giungla.pdf')"><img src="../assets/icons/Download.svg" alt=""></button>
            </div>
            <div class="block__cards__item">
              <img src="/assets/img/library/book4.png" alt="">
              <button class="download__btn" onclick="download('assets/books/le mani nei cappelli.pdf')"><img src="../assets/icons/Download.svg" alt=""></button>
            </div>
          </div>
        </div>
        <div class="main__content__block">
          <h2>Блог</h2>
          <img src="/assets/img/library/blogImg.png" alt="">
          <h3>Какие заимствования пришли к нам из Италии?</h3>
          <p class="blog__text">
            Много итальянских слов пришло в русский из сферы искусства. Многие архитектурные памятники в
            Санкт-Петербурге были
            созданы итальянскими гениями, самый известный из которых –Растрелли...
          </p>
          <a class="blog__link" href="#">Читать далее <img src="/assets/icons/arrow--blue.svg" alt=""></a>
        </div>
      </section>
    </main>
    <aside class="music">
      <section class="product">
        <img src="/assets/img/library/asideImg.png" alt="">
        <div class="music__content">
          <h1>Sedia</h1>
          <p class="main__title__text">стул</p>
          <div class="music__controlls">
            <button class="btn__controll"><img src="/assets/img/library/controll__complete.svg" alt=""></button>
              <!-- <button class="btn__controll"><img src="/assets/img/library/controll__close.svg" alt=""></button> -->
              <button class="btn__controll"><img src="/assets/img/library/controll__favorite.svg" alt=""></button>
          </div>
        </div>
      </section>
      <section class="song">
        <div class="song__info">
          <div class="song__info__title">
            <h2>Песня дня</h2>
            <p class="main__title__text">Maneskin - Torna a Casa</p>
          </div>
          <img src="/assets/img/library/song-avatar.png" alt="">
        </div>
        <audio class="song__bar" controls>
        <source src="/assets/audio/Torna_a_casa.ogg" type="audio/ogg">
          <source src="/assets/audio/Torna_a_casa.mp3" type="audio/mpeg">
          <p>Ваш браузер не поддерживает HTML5 аудио. Вот взамен
            <a href="/assets/audio/Torna_a_casa.mp3">скачайте песню и послушайте локально</a>
          </p>
        </audio>
      </section>
    </aside>
    </div>
  <script src="/js/bookdownload.js"></script>
  <script src="/js/popup.js"></script>
</body>

</html>
