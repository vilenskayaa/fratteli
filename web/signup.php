<?php

session_start();

$page_title = "Регистрация";

?>

<?php include "../layout/meta.php"; ?>

<body>
  <main class="sign sign-up">
    <section class="sign__container" data-signUp>
      <header class="sign__header">
        <header class="sign__logo">
          <img class="sign__logo-img" src="/assets/img/logo.png" alt="Fratelli">
        </header>
        <div class="sign__header-title">
          Добро пожаловать!
        </div>
        <div class="sign__subtitle">
          <span>Начните свое итальянское путешествие!</span>
          <span>Есть аккаунт? <a class="sign__link" href="/web/signin.php">Войдите прямо сейчас!</a></span>
        </div>
      </header>
      <form class="form form-sign" action="" id="signUp">
        <div class="form__fields">
          <div class="form__item input_field_email">
            <input class="form__input" name="email" type="email" placeholder="Email" required>
            <div class="form_input_error_text">Пользователь с таким email уже зарегистрирован</div>
          </div>
          <div class="form__item">
            <input class="form__input" name="name" type="text" placeholder="Имя пользователя" required>
          </div>
          <div class="form__item input_field_password">
            <input class="form__input" name="password" type="password" placeholder="Пароль" required>
            <div class="form_input_error_text">Пароль должен быть не менее 6 символов, содержать буквы и цифры</div>
            <i id="viewField" class="form__item-icon ci-hide"></i>
          </div>
          <div class="form__item input_field_password_repeat">
            <input class="form__input" name="passwordRepeat" type="password" placeholder="Подтвердите пароль" required>
            <div class="form_input_error_text">Пароли должны совпадать</div>
          </div>
        </div>
        <button class="form__btn">
          Зарегистрироваться
        </button>
      </form>
    </section>

    <section class="sign__container" data-signRole>
      <header class="sign__header">
        <header class="sign__logo">
          <img class="sign__logo-img" src="/assets/img/logo.png" alt="Fratelli">
        </header>
        <div class="sign__header-title">
          Выберите роль:
        </div>
        <div class="sign__subtitle">
          <span>Начните свое итальянское путешествие!</span>
          <span>Есть аккаунт? <a class="sign__link" href="/web/signin.html">Войдите прямо сейчас!</a></span>
        </div>
      </header>
      <form class="form form-sign" action="" id="signRole">
        <div class="form__fields form__fields-role">
          <label class="form__card">
            <input name="role" type="radio" value="student" hidden id="inputStudent" required>
            <label for="inputStudent" class="form__card-picture">
              <img class="form__cart-image" src="/assets/img/sign/student.png" alt="Student">
            </label>
            <div class="form__card-title">
              <span>Хочу изучать</span>
              <span>итальянский</span>
            </div>
          </label>
          <div class="form__card">
            <input name="role" type="radio" value="teacher" hidden id="inputTeacher" required>
            <label for="inputTeacher" class="form__card-picture">
              <img class="form__cart-image" src="/assets/img/sign/teacher.png" alt="Teacher">
            </label>
            <div class="form__card-title">
              <span>Хочу обучать</span>
              <span>итальянскому</span>
            </div>
          </div>
        </div>
        <button class="form__btn" >
          Далее
        </button>
      </form>
    </section>

    <section class="sign__container" data-signLevel>
      <header class="sign__header">
        <header class="sign__logo">
          <img class="sign__logo-img" src="/assets/img/logo.png" alt="Fratelli">
        </header>
        <div class="sign__header-title">
            Тест на определение<br> уровня итальянского
        </div>
        <div class="sign__subtitle">
              <span style="text-align: center">Для дальнейшей регистрации нам нужно знать, насколько хорошо<br> вы владеете итальянским. Пожалуйста, пройдите тест из 10<br> вопросов, и мы сможем начать нашу работу.</span>
        </div>
      </header>
        <a class="form__btn" style="text-decoration: none; width: 400px; text-align: center;" href="/web/reg-test.php">Начать тест</a>
    </section>

    <section class="sign__container" data-signEnd>
      <header class="sign__header">
        <header class="sign__logo">
          <img class="sign__logo-img" src="/assets/img/logo.png" alt="Fratelli">
        </header>
        <div class="sign__header-title">
          Ваш аккаунт успешно<br>
          зарегистрирован!
        </div>
        <div class="sign__subtitle">
          <span>Продолжим путешествие?</span>
        </div>
      </header>
      <form class="form" action="" id="signEnd">
        <div class="form__fields"></div>
        <button class="form__btn" id="btnEnd">
          Далее
        </button>
      </form>
    </section>
  </main>

  <script src="/js/jquery.js"></script>
  <script src="/js/cookie.js"></script>
  <script src="/js/sign/sign.js"></script>
</body>

</html>