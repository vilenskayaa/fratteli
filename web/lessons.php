<?php

session_start();
$page_title = "Группы";

?>

<?php include "../layout/meta.php"; ?>

<body class="container__aside">
  
<?php include "../layout/side-menu.php" ?>
  <main class="container">
    <div class="head">
      <div class="head__info">
        <div class="head__title">Расписание</div>
        <div class="head__subtitle">Актуальные события на день грядущий</div>
      </div>
      <div class="head__nav">
        <div class="btn" data-popup>
          Создать урок
        </div>
      </div>
    </div>
    <div class="classgroup" id="classgroup">

    </div>
    <div>
        <input type="date" id="lessonDate">
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
      <form class="form" action="">
        <div class="form__fields">
          <div class="form__item">
            <input class="form__input" id="lesson_title" type="text" placeholder="Название урока" required>
          </div>
          <div class="form__item">
            <input class="form__input" id="lesson_date" type="date" placeholder="Дата" required>
          </div>
          <div class="form__item">
            <select class="form__input" placeholder="Группа" required id="selectGroups"></select>
          </div>
          <div class="form__item">
            <input class="form__input" id="lesson_link" type="text" placeholder="Ссылка на Google.Meet" required>
          </div>
        </div>
        <button  id="createLessonBtn" class="form__btn">
          Далее
        </button>
      </form>
    </div>
  </div>


  <script src="/js/jquery.js"></script>
  <script src="/js/lesson.js"></script>
</body>

</html>