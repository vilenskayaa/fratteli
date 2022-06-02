<?php

session_start();
$page_title = "Тест завершен!"

?>

<?php include "../layout/meta.php"; ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href=".../styles/css/test-copleted/test-completed.css">
  <link rel="stylesheet" href="/styles/css/all.css">
</head>

<body>
  <?php include "../layout/side-menu.php" ?>
  <div class="wrapper">
  <main class="container container__aside">
      <div class="head__info">
            <div class="head__title">QCE Livello di contatto</div>
            <div class="head__subtitle">9 вопросов</div>
        </div>
       
            <div class="head__nav">
                <div class="btn" data-popup>
                Пройти тест еще раз
                </div>
            </div>
    </div>
    <img class="main__bg" src="/assets/img/test-completed/test-completed-bg.png" alt="">
      
      <div class="test__main">
        <p class="test__main__mark">
          6/9
        </p>
        <p class="test__info__test">
          Удовлетворительно
        </p>
      
        <a href="#" class="nav__list__item link--clear">Все тесты <img src="/assets/icons/arrow--blue.svg" alt=""></a>

      </div>
      </div>
    </main>
  </div>
</body>

