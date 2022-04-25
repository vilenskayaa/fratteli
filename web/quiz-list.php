<?php

session_start();
$page_title = "Мои тесты"

?>

<?php include "../layout/meta.php"; ?>

<style>

.test_list {
    display: flex;
}

.card {
    background-color: #fff;
    background: #FFFFFF;
    border-radius: 16px;
    width: 250px;
    margin: 20px;
    border: 1px solid #ececec;
    padding: 30px;
}

.test_title{
font-weight: 600;
font-size: 28px;
line-height: 32px;
margin: 20px 0;
}
.black_arrow{
    padding: 10px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #2E3134;
    color: #fff;
    display: inline-block;
    border: none;
    outline: none;
}
.black_arrow:hover {
    cursor: pointer;
}
.test_bottom {
    display: flex;
    justify-content: space-between;
}
.test_info {
    display: flex;
    flex-direction: column;
}
</style>

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
      <div id="testList" class="test_list">
        
      </div>
      
  </main>


  <script src="../js/quiz/quiz.js"></script>
</body>

</html>