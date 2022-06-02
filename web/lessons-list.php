<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
$page_title = "Участники группы";
require_once '../app/db.php';
?>

<?php include "../layout/meta.php"; ?>

<body>
  <?php include "../layout/side-menu.php" ?>
  <main class="container container__aside full-width">
    <div class="head">
      <div class="head__info">
        <div class="head__title">
          <span id="headTitle"></span>
        </div>
      </div>
      <div class="head__nav">
        <div class="head__nav-default">
          <a href="" target="_blank" class="btn btn-square" data-meet="" style="background-color: #4D62ED;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.17188 14.8287L14.8287 9.17188" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M7.75774 12.0001C8.14826 11.6096 8.14826 10.9764 7.75774 10.5859C7.36721 10.1953 6.73405 10.1953 6.34352 10.5859L7.75774 12.0001ZM13.4146 17.6569C13.8051 17.2664 13.8051 16.6332 13.4146 16.2427C13.0241 15.8522 12.3909 15.8522 12.0004 16.2427L13.4146 17.6569ZM6.34352 10.5859L4.92931 12.0001L6.34352 13.4143L7.75774 12.0001L6.34352 10.5859ZM12.0004 19.0711L13.4146 17.6569L12.0004 16.2427L10.5862 17.6569L12.0004 19.0711ZM4.92931 19.0711C6.88193 21.0238 10.0478 21.0238 12.0004 19.0711L10.5862 17.6569C9.41459 18.8285 7.5151 18.8285 6.34352 17.6569L4.92931 19.0711ZM4.92931 12.0001C2.97669 13.9527 2.97669 17.1185 4.92931 19.0711L6.34352 17.6569C5.17195 16.4854 5.17195 14.5859 6.34352 13.4143L4.92931 12.0001Z" fill="white" />
              <path d="M10.5859 6.34303C10.1953 6.73356 10.1953 7.36672 10.5859 7.75725C10.9764 8.14777 11.6096 8.14777 12.0001 7.75725L10.5859 6.34303ZM16.2427 11.9999C15.8522 12.3904 15.8522 13.0236 16.2427 13.4141C16.6332 13.8046 17.2664 13.8046 17.6569 13.4141L16.2427 11.9999ZM12.0001 7.75725L13.4143 6.34304L12.0001 4.92882L10.5859 6.34303L12.0001 7.75725ZM17.6569 10.5857L16.2427 11.9999L17.6569 13.4141L19.0711 11.9999L17.6569 10.5857ZM17.6569 6.34304C18.8285 7.51461 18.8285 9.4141 17.6569 10.5857L19.0711 11.9999C21.0238 10.0473 21.0238 6.88144 19.0711 4.92882L17.6569 6.34304ZM13.4143 6.34304C14.5859 5.17146 16.4854 5.17146 17.6569 6.34304L19.0711 4.92882C17.1185 2.9762 13.9527 2.9762 12.0001 4.92882L13.4143 6.34304Z" fill="white" />
            </svg>
          </a>
            <?php if ($_SESSION['user']['role'] === 'teacher'): ?>
          <div class="btn btn-square" data-popup="popup-1">
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
            <?php endif; ?>
          <div class="btn btn-square btn-red" id="delete">
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
        Введите email пользователя:
      </div>
      <form class="form" action="" id="addStudent">
        <div class="form__fields">
          <div class="form__item">
            <input class="form__input" name="student_email" type="text" placeholder="Введите email ученика" required>
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
        Введите email пользователя:
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
  <script src="/js/lesson-list.js"></script>
</body>

</html>