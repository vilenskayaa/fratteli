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
  <link href="../styles/css/components/blogpopup.css" rel="stylesheet"/>

</head>
<body>
  <?php include "../layout/side-menu.php" ?>
    <div class="wrapper">

    <main class="container container__aside">
  
      <div class="head">
      <div class="head__info">
        <div class="head__title">Библиотека</div>
        <div class="head__subtitle">Заходи и читай здесь самые интересные материалы для изучения итальянского</div>
      </div>
    </div>
      <section class="main__content">

        <div class="main__content__block">
          <h2>Лучшие книги недели</h2>
            <div id="block__cards" class="block__cards"></div>
          <div id="wrapper-books"></div>
          </div>

        <div class="main__content__block">
          <h2>Статьи недели</h2>
          <div id="wrapper-posts"></div>
        <a href="#" class="head__subtitle">Подняться вверх</a>
      </section>
    </main>
    <aside class="music">
        <section id="product" class="product"></section>
      <section class="song">
        <div class="song__info">
          <div class="song__info__title">
            <h2>Песня недели</h2>
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
    <div class="blog-popup-container"></div>
  <script src="/js/jquery.js"></script>
  <script src="/js/bookdownload.js"></script>
  <script src="/js/popup.js"></script>
  <script src="/js/blogpopup.js"></script>
  <script src="/js/library.js"></script>
</body>

</html>
