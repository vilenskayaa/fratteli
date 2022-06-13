<?php

session_start();
require_once '../app/db.php';
$page_title = "Создание теста";

$userId = $_SESSION['user']['id'];
$selectGroups = "SELECT * FROM `group` WHERE `teacher_id` = {$userId}";
$groups = queryAll($db, $selectGroups);
?>

<?php include "../layout/meta.php"; ?>

<style>
  .form__item.answer {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .form__item.answer input[type="radio"] {
    background-color: #000;
    width: 24px;
    height: 24px;
  }
</style>

<body>
  <?php include "../layout/side-menu.php" ?>
  <main class="container container__aside">
    <div class="head">
      <div class="head__info">
        <div class="head__title">Создание теста</div>
        <div class="head__subtitle"></div>
      </div>
      <div class="head__nav">
        <div class="btn" data-add>
          Отправить тест
        </div>
      </div>
    </div>
    <div class="">
      <div class="test tests-container">
        <h2>Информация о тесте</h2>
        <form class="form" action="" id="title">
          <div class="form__fields">
            <div class="form__item">
              <input class="form__input" name="test_title" type="text" placeholder="Название теста" required>
            </div>
            <div class="form__item">
              <select class="form__input" style="width:30px;-webkit-appearance: none;"  name="test_level" placeholder="Выберите ваш уровень" required>
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
              </select>
            </div>
            <!-- <div class="form__item">
              <input class="form__input" name="test_time" type="text" placeholder="Примерное время прохождения" required>
            </div> -->
            <div class="form__item">
              <input class="form__input" name="test_complexity" type="text" placeholder="Порог в формате < 3/5 >">
            </div>
          <div class="form__item">
              <select class="form__input" name="groups" multiple="multiple" required>
                  <?php foreach ($groups as $group): ?>
                    <option value="<?= $group['group_id']?>"><?= $group['group_title'] ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          </div>
        </form>
        <h2>Вопросы</h2>
        <div class="question__list">

          <form class="form question__form">
            <div class="form__fields">
              <div class="form__item">
                <input class="form__input" name="question_title" type="text" placeholder="Название вопроса" value="Вопрос 1" required>
              </div>
              <div class="form__item">
                <input class="form__input" name="question_desc" placeholder="Текст вопроса">
              </div>
              <form class="form" action="">
                <div class="form__fields">
                  <div class="form__item answer">
                    <input type="radio" name="is_correct" value="1">
                    <input class="form__input" name="answer_title" type="text" placeholder="Текст ответа" required>
                  </div>
                  <div class="form__item answer">
                    <input type="radio" name="is_correct" value="2">
                    <input class="form__input" name="answer_title" type="text" placeholder="Текст ответа" required>
                  </div>
                  <div class="form__item answer">
                    <input type="radio" name="is_correct" value="3">
                    <input class="form__input" name="answer_title" type="text" placeholder="Текст ответа" required>
                  </div>
                  <div class="form__item answer">
                    <input type="radio" name="is_correct" value="4">
                    <input class="form__input" name="answer_title" type="text" placeholder="Текст ответа" required>
                  </div>
                </div>
              </form>
            </div>
          </form>

        </div>
        <div class="btn btn-gray" id="add">Добавить вопрос</div>
      </div>
      <div class="">

      </div>
    </div>
  </main>


  <script src="../js/jquery.js"></script>
  <script src="../js/quiz/quiz-add.js"></script>
</body>

</html>