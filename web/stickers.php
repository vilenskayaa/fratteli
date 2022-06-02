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
</head>

<body>
  <?php include "../layout/side-menu.php" ?>

  <div class="wrapper">
    <main class="container container__aside">
      <div class="main__title">
      <div class="head__title">Стикеры</div>
      <div class="head__subtitle">
          Тут будут слова, отмеченные вами и собранные в одном месте
</div>
      </div>
      <section class="selected">
        <div class="selected__title">
          <h2>Избранные</h2>
          <img src="/assets/icons/like--blue.svg" alt="">
        </div>
        <div id="selected__cards" class="selected__cards"></div>
      </section>
    </main>
    
  </div>

  <script src="/js/jquery.js"></script>
  <script src="/js/popup.js"></script>
  <script src="/js/stickers.js"></script>
</body>
</html>
