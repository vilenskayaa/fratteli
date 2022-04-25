<?php

session_start();
$id = $_GET["test_id"];
$page_title = "Тест";

?>

<?php include "../layout/meta.php"; ?>

<body class="container__aside">
  <aside class="nav">
    <div class="nav__top">
      <div class="nav__logo">
        <img src="/assets/img/logo.png" alt="">
      </div>
      <nav class="nav__list">
        <a href="" class="nav__item">Мое расписание</a>
        <a href="" class="nav__item">Мои группы</a>
        <a href="" class="nav__item">Словарь</a>
        <a href="" class="nav__item">Словарь</a>
        <a href="/quiz-list.php" class="nav__item">Тесты</a>
      </nav>
    </div>
    <div class="nav__bottom">
      <a href="" class="nav__bottom-item">Настройки</a>
      <a href="/app/account/logout.php" class="nav__bottom-item">Выход</a>
    </div>
  </aside>
  <main class="">
      <div id="testContainer"></div>
  </main>

  <script src="../js/quiz/get-one-quiz.js"></script>
</body>

</html>