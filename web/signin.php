<?php

session_start();

if ($_SESSION['user']) {
  header('location: /web/home.php');
}

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
          <span>Войдите в систему или <a class="sign__link" href="/web/signup.php">зарегестрируйтесь прямо
              сейчас!</a></span>
        </div>
      </header>
      <form class="form" action="" id="signIn">
        <div class="form__fields">
          <div class="form__item">
            <input class="form__input" name="email" type="email" id="email" placeholder="Email" required>
          </div>
          <div class="form__item">
            <input class="form__input" name="password" type="password" id="password" placeholder="Пароль" required>
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