<?php

session_start();
$page_title = "Группы";

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
        <a href="" class="nav__item">Тесты</a>
      </nav>
    </div>
    <div class="nav__bottom">
      <a href="" class="nav__bottom-item">Настройки</a>
      <a href="/app/account/logout.php" class="nav__bottom-item">Выход</a>
    </div>
  </aside>
  <main class="container">
    <div class="head">
      <div class="head__info">
        <div class="head__title">Мои группы</div>
        <div class="head__subtitle">Здесь можно найти список всех ваших групп, отредактировать их и настроить для дальнейшего взаимодействия</div>
      </div>
      <div class="head__nav">
        <div class="btn" data-popup>
          Создать группу
        </div>
      </div>
    </div>
    <div class="classgroup">

    </div>
  </main>

  <div class="overlay"></div>
  <div class="popup__overlay">
    <div class="popup">
      <div class="popup__title">
        Создание группы
      </div>
      <div class="popup__subtitle">
        Введите нужные данные
      </div>
      <form class="form" action="" id="">
        <div class="form__fields">
          <div class="form__item">
            <input class="form__input" name="group_title" type="text" placeholder="Название группы" required>
          </div>
          <div class="form__item">
            <select class="form__input" name="group_level" placeholder="Выберите ваш уровень" required>
              <option value="A1">A1</option>
              <option value="A2">A2</option>
              <option value="B1">B1</option>
              <option value="B2">B2</option>
              <option value="C1">C1</option>
              <option value="C2">C2</option>
            </select>
          </div>
        </div>
        <button type="submit" class="form__btn">
          Далее
        </button>
      </form>
    </div>
  </div>


  <script src="/js/jquery.js"></script>
  <script src="/js/group.js"></script>
</body>

</html>