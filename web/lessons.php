<?php

session_start();
$page_title = "Мое расписание";

?>

<?php include "../layout/meta.php"; ?>

<style>
  #lessonDate {
    font-size: 24px;
    padding: 12px 24px;
    border-radius: 16px;
    opacity: 0.5;
    margin-bottom: 20px;
  }
</style>

<body>
  <?php include "../layout/side-menu.php" ?>
  <main class="container container__aside">
    <div class="head">
        <div class="head__info">
            <div class="head__title">Расписание</div>
            <div class="head__subtitle">Актуальные события на день грядущий</div>
        </div>
        <?php if ($_SESSION['user']['role'] === 'teacher'): ?>
            <div class="head__nav">
                <div class="btn" data-popup>
                Создать урок
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="">
      <input type="date" id="lessonDate">
    </div>
    <div class="classgroup" id="classgroup">

    </div>

  </main>

  <div class="overlay"></div>
  <div class="popup__overlay">
    <div class="popup">
      <div class="popup__title">
        Создание урока
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
            <input class="form__input" id="lesson_time" type="time" placeholder="Время занятия" required>
          </div>
          <div class="form__item">
            <select class="form__input" placeholder="Группа" required id="selectGroups"></select>
          </div>
          <div class="form__item">
            <input class="form__input" id="lesson_link" type="text" placeholder="Ссылка на Google.Meet" required>
          </div>
        </div>
        <button id="createLessonBtn" class="form__btn">
          Далее
        </button>
      </form>
    </div>
  </div>


  <script src="/js/jquery.js"></script>
  <script src="/js/lesson.js"></script>
</body>

</html>