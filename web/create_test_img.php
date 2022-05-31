<?php

session_start();
$page_title = "Библиотека"

?>

<?php include "../layout/meta.php"; ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../styles/css/create_test_img.css" rel="stylesheet"/>
  <link rel="stylesheet" href="/styles/css/components/popup.css">

</head>
<body>
  <?php include "../layout/side-menu.php" ?>
 <main class="container container__aside">
    <section class="main__header">
      <div class="main__title">
        <h1>Создать тест </h1>
        <p class="main__title__text">
          Проявите всю креативность и фантазию!
        </p>
      </div>
      <div class="main__header__controlls">
        <button class="btn btn__close"><img src="../assets/icons/cross.svg" alt=""></button>
        <button class="btn btn__send">ОТПРАВИТЬ ТЕСТ</button>
      </div>
    </section>
    <section class="question">
        <div class="question__title">
          <h2>Вопрос 1</h2>
          <p class="question__text">Напишите вопрос в двух частях (между ними будет пропущенная часть)</p>
        </div>
        <div class="question__parts">
          <div class="answer__item">
            <p class="answer__item__text">Durata globale</p>
          </div>
          <div class="answer__item">
            <p class="answer__item__text">sostenuta − a discrezione dei candidati − in coppia o singolarmente.</p>
          </div>
        </div>
    </section>
    <section class="answers">
      <h2>Ответы (4)</h2>
      <div class="answers__list">
        <div class="answer__item answer__item--active">
          <p class="answer__item__text">può essere sostenuta</p>
          <img src="../assets/icons/que-selected.svg" alt="">
        </div>
        <div class="answer__item">
          <p class="answer__item__text">può essere sostenuta</p>
        </div>
        <div class="answer__item">
          <p class="answer__item__text">può essere sostenuta</p>
        </div>
        <div class="answer__item">
          <p class="answer__item__text">può essere sostenuta</p>
        </div>
      </div>
    </section>
        
    <button class="add__btn">
      <img src="../assets/icons/plus.png" alt="">добавить вопрос
    </button>
 </main>
</body>
</html>