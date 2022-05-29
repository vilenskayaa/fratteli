<?php

session_start();

?>

<?php include "../layout/meta.php"; ?>

<body>
  <?php include "../layout/side-menu.php" ?>
  <main class="container container__aside">
    <div class="head">
      <div class="head__info">
        <div class="head__title">
          <span id="headTitle">Группа 1</span>
          <div class="head__level">
            Начинающие
          </div>
        </div>
        <div class="head__subtitle head__subtitle-600">10/10</div>
      </div>
      <div class="head__nav">
        <div class="head__nav-default">
          <div class="btn btn-square" data-popup>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.4852 12H3.51465" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M12 3.51469V20.4853" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="btn btn-square btn-gray" id="edit">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 19.9998V20.9998C8.26522 20.9998 8.51957 20.8945 8.70711 20.707L8 19.9998ZM4 19.9998H3C3 20.5521 3.44772 20.9998 4 20.9998V19.9998ZM4 15.9998L3.29289 15.2927C3.10536 15.4803 3 15.7346 3 15.9998H4ZM15.2929 4.70696L16 5.41406L16 5.41406L15.2929 4.70696ZM16.7071 4.70696L16 5.41406L16 5.41406L16.7071 4.70696ZM19.2929 7.29274L20 6.58564V6.58564L19.2929 7.29274ZM19.2929 8.70696L18.5858 7.99985L19.2929 8.70696ZM8 18.9998H4V20.9998H8V18.9998ZM5 19.9998V15.9998H3V19.9998H5ZM4.70711 16.707L16 5.41406L14.5858 3.99985L3.29289 15.2927L4.70711 16.707ZM16 5.41406L18.5858 7.99985L20 6.58564L17.4142 3.99985L16 5.41406ZM18.5858 7.99985L7.29289 19.2927L8.70711 20.707L20 9.41406L18.5858 7.99985ZM18.5858 7.99985V7.99985L20 9.41406C20.781 8.63302 20.781 7.36669 20 6.58564L18.5858 7.99985ZM16 5.41406H16L17.4142 3.99985C16.6332 3.2188 15.3668 3.2188 14.5858 3.99985L16 5.41406Z" fill="#2E3134" />
              <path d="M12 8L16 12" stroke="#2E3134" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="btn btn-square btn-red">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 18L6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M18 6L6 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div>

        <div class="head__nav-sub" id="closeEdit">

          <span>Выйти из режима<br>
            редактирования</span>
          <div class="btn btn-square btn-red" id="editHide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 18L6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M18 6L6 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="grouplist">
      <div class="grouplist__title">
        Участники
      </div>
      <div class="table">

      </div>
    </div>
  </main>

  <div class="overlay"></div>
  <div class="popup__overlay" id="popup-1">
    <div class="popup">
      <div class="popup__title">
        Добавить нового ученика?
      </div>
      <div class="popup__subtitle">
        Найдите никнейм в поисковой строке:
      </div>
      <form class="form" action="" id="addStudent">
        <div class="form__fields">
          <div class="form__item">
            <input class="form__input" name="student_email" type="text" placeholder="Введите нинкнейм ученика" required>
          </div>
        </div>
        <button class="form__btn">
          Добавить
        </button>
      </form>
    </div>
  </div>

  <div class="popup__overlay" id="popup-2">
    <div class="popup">
      <div class="popup__title">
        Добавить нового ученика?
      </div>
      <div class="popup__subtitle">
        Найдите никнейм в поисковой строке:
      </div>
      <form class="form" action="" id="">
        <div class="form__fields">
          <div class="form__item">
            <input class="form__input" name="student_email" type="text" placeholder="Введите нинкнейм ученика" required>
          </div>
        </div>
        <button type="submit" class="form__btn">
          Добавить
        </button>
      </form>
    </div>
  </div>

  <div class="popup__overlay" id="popup-3">
    <div class="popup">
      <div class="popup__title">
        Удалить группу?
      </div>
      <div class="popup__subtitle">
        Вы уверены, что хотите удалить группу?
      </div>
      <div class="popup__choise">
        <div class="btn btn-gray">Нет</div>
        <div class="btn">Нет</div>
      </div>
    </div>
  </div>


  <script src="/js/jquery.js"></script>
  <script src="/js/group-list.js"></script>
</body>

</html>