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
        <div class="head__subtitle">Заходи и читай здесь самые интересные материалы для изучения итальянского</div>
      </div>
    </div>
      <section class="main__content">
        <div class="main__content__block">
          <h2> Лучшие книги недели  </h2>

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
          <h2>Статьи недели</h2>
          <div class="blog_item">
          <img src="/assets/img/library/blog/1.png" alt="">
          <h3>Какие заимствования пришли к нам из Италии?</h3>
          <p class="blog__text">
            Много итальянских слов пришло в русский из сферы искусства. Многие архитектурные памятники в
            Санкт-Петербурге были
            созданы итальянскими гениями, самый известный из которых –Растрелли...
          </p>
          <a href="#" class="blog__link">Читать далее <img src="/assets/icons/arrow--blue.svg" alt=""></a>
          </div>

          <div class="blog_item">
          <img src="/assets/img/library/blog/2.png" alt="">
          <h3>Семейные традиции в Италии</h3>
          <p class="blog__text">
          Главная ценность для любого итальянца – его семья, а главным сокровищем каждой семьи являются дети.
          Детей здесь очень балуют, ими гордятся, восхищаются, радуются каждому
          их поступку и почти ничего не запрещают...
          </p>
          <a href="#" class="blog__link">Читать далее <img src="/assets/icons/arrow--blue.svg" alt=""></a>
          </div>

          <div class="blog_item">
          <img src="/assets/img/library/blog/3.png" alt="">
          <h3>Жизнь в Италии</h3>
          <p class="blog__text">
          С точки зрения климата, цен и общего уровня комфорта, лучшие города для жизни в Италии в 2022 году – это Милан, Больцано, Аоста, Беллуно и Тренто.
          </p>
          <a href="#" class="blog__link">Читать далее <img src="/assets/icons/arrow--blue.svg" alt=""></a>
          </div>

          <div class="blog_item">
          <img src="/assets/img/library/blog/4.png" alt="">
          <h3>Каким образом изучение языков влияет на мозг человека?</h3>
          <p class="blog__text">
          Изучение языка – и родного, и иностранного – очень сложный процесс, в который вовлекаются различные отделы головного мозга. В процессе изучения языка новая информация не просто должна запомниться, ее необходимо воспроизводить устно и письменно...
          </p>
          <a href="#" class="blog__link">Читать далее <img src="/assets/icons/arrow--blue.svg" alt=""></a>
          </div>

          <div class="blog_item">
          <img src="/assets/img/library/blog/5.png" alt="">
          <h3>Система образования в Италии</h3>
          <p class="blog__text">
          Система образования в Италии, так же как и большинство систем образования в других европейских государствах состоит из 4 этапов. Это - дошкольное, начальное, среднее и высшее образование.
          </p>
          <a href="#" class="blog__link">Читать далее <img src="/assets/icons/arrow--blue.svg" alt=""></a>
          </div>



      <a href="#" class="head__subtitle">Назад</a>



      </section>
    </main>
    <aside class="music">
    <div class="fix">
      <section class="product">
        <div class="img__card">
        <img  src="/assets/img/library/asideImg.png"alt="">
</div>
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
</div>
      </section>
    </aside>
    </div>
  <script src="/js/bookdownload.js"></script>
  <script src="/js/popup.js"></script>
  <script src="/js/blogpopup.js"></script>
</body>

</html>
