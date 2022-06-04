<?php

session_start();
$page_title = "Авторизация";

?>

<?php include "../layout/meta.php"; ?>

<body>
  <main class="sign sign-in">
    <section class="sign__container">
      <header class="sign__header">
        <header class="sign__logo">
          <img class="sign__logo-img" src="/assets/img/logo.png" alt="Fratelli">
        </header>
        <div class="sign__header-title">
          Bonjorno!
        </div>
        <div class="sign__subtitle">
          <span>Начните свое итальянское путешествие!</span>
          <span>Войдите в систему или <a class="sign__link" href="/web/signup.php">зарегистрируйтесь прямо
              сейчас!</a></span>
        </div>
      </header>
      <form class="form form-sign" action="" id="signIn">
        <div class="form__fields">
          <div class="form__item input_field_email">
            <input class="form__input" name="email" type="email" id="email" placeholder="Email" required>
            <div class="form_input_error_text">Неверный email</div>
          </div>
          <div class="form__item input_field_password">
            <input class="form__input" name="password" type="password" id="password" placeholder="Пароль" required>
            <div class="form_input_error_text">Неверный пароль</div>
            <i id="viewField" class="form__item-icon ci-hide"></i>
          </div>
        </div>
        <button class="form__btn">
          Войти
        </button>
      </form>
    </section>
  </main>

  <script src="/js/jquery.js"></script>
  <script src="/js/sign/signin.js"></script>
</body>

</html>