<?php

session_start();
$page_title = "Fratteli";

?>
<?php include "../layout/meta.php"; ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../styles/sass/all.scss" rel="stylesheet"/>
  <link href="../styles/css/landing.css" rel="stylesheet"/>
  <link href="../styles/css/slick.css" rel="stylesheet"/>
  <link href="../styles/css/slick-theme.css" rel="stylesheet"/>
</head>


<body>
  <header class="header">
    <div class="header__container">
      <p class="header__text">Зарегистрируйся сейчас и получи бесплатно доступ к тесту P.L.I.D.A.</p>
      <img src="../assets/icons/cross.svg" class="header__img" alt="close">
    </div>
  </header>
  <main>
    <section class="hero" id="hero">
      <img class="hero__background" src="../assets/img/heroBack2.svg" alt="">
      <div class="container">
        <div class="hero__offer">
          <img class="hero__offer__image" src="../assets/img/logo.svg" alt="">
          <h1>Начни свое
            итальянское путешествие!</h1>
          <p class="hero__offer__text">Только до 21.04.2022 подарок для новых пользователей - карточки заданий к тесту
            P.L.I.D.A.!</p>
          <div class="hero__offer__button">
            <a class="btn" href="../web/signin.php">начать</a>
          </div>
        </div>
        <div class="hero__person">
          <img src="../assets/img/heroMan.png" class="hero__person__image" alt="">
        </div>
      </div>
    </section>
    <section class="about">
      <div class="container">
        <div class="about__block">
          <div class="about__block__text">
            <h3>Современные уроки итальянского</h3>
            <ul class="block__text__list list">
              <li class="list__item">Учись у сертифицированных преподавателей с большим опытом работы</li>
              <li class="list__item">Преподаватели со всего мира делятся не только знаниями языка, но так же культурой и
                традициями своей страны.</li>
              <li class="list__item">Занимайся в удобном темпе, не беспокоясь о неудобном расписании. Никакого кота в
                мешке, плати так, как выгодно тебе</li>
            </ul>
            <a class="block__text__link" href="../web/signin.php">Найти преподавателя</a>
          </div>
          <div class="about__block__img">
            <img src="../assets/img/aboutImg1.png" alt="Современные уроки итальянского">
          </div>
        </div>
        <div class="about__block">
          <div class="about__block__img">
            <img src="../assets/img/aboutImg2.png" alt="Современные уроки итальянского">
          </div>
          <div class="about__block__text">
            <h3>Расширяй возможности изучения за пределами занятий</h3>
            <div class="list__item">Узнай свой уровень с помощью бесплатного теста</div>
            <a class="block__text__link" href="../web/signin.php">Узнать больше</a>
          </div>
        </div>
      </div>
    </section>
    <section class="course">
      <div class="container">
        <div class="course__text">
          <div class="course__text__offer">
            <h4>Бизнес лексика</h4>
            <p class="main__text">Подбери репетитора с опытом преподавания деловых навыков общения и лексики,
              это поможет тебе в карьере
              или для
              прохождения собеседования</p>
            <a class="block__text__link" href="../web/signin.php">Расширяй словарный запас</a>
          </div>
          <div class="course__text__offer">
            <h4>Подготовка к экзамену</h4>
            <p class="main__text">Получи необходимый балл для сдачи экзаменов</p>
            <a class="block__text__link" href="../web/signin.php">Готовься к тестам</a>
          </div>
          <div class="course__text__offer">
            <h4>Разговорная практика</h4>
            <p class="main__text">Подари себе уверенность в разговорах и общайся на темы, которые тебе
              интересны</p>
            <a class="block__text__link" href="../web/signin.php">Практикуй язык</a>
          </div>
        </div>

      </div>
      <div class="course__img">
        <h3>Занятия под твои цели и интересы</h3>
        <div class="course__img__block">
          <img src="../assets/img/aboutImg3.png" alt="Занятия под твои цели и интересы">
        </div>
      </div>
    </section>
    <section class="clients">
      <div class="container">
        <h2>Нам доверяют</h2>
        <div class="clients__cards">
          <div class="cards__item">
            <img src="../assets/img/client1.png" alt="client">
            <h4>Алексей</h4>
            <p class="main__text">
              Я начал учиться два месяца назад и могу сказать, что добился заметных успехов в итальянском. Уже на самом
              первом уроке я
              понял, что мой преподаватель поможет мне очень быстро повысить мой уровень.
            </p>
          </div>
          <div class="cards__item">
            <img src="../assets/img/client2.png" alt="client">
            <h4>Ксения</h4>
            <p class="main__text">
              У меня было пять уроков и просто поразительно, сколько я уже узнала. Мой преподаватель не только
              общается со мной
              на итальянском, но и отправляет материалы, которыми я могу заниматься в своем ритме.</p>
          </div>
          <div class="cards__item">
            <img src="../assets/img/client3.png" alt="client">
            <h4>Максим</h4>
            <p class="main__text">
              Я заметил что мой подход к изучению итальянского языка стал гораздо эффективнее. Я даже прошел несколько
              собеседований
              на итальянском. Еще несколько месяцев назад это было совершенно невозможно.</p>
          </div>
          <div class="cards__item">
            <img src="../assets/img/client4.png" alt="client">
            <h4>Юлия</h4>
            <p class="main__text">
              Я сомневалась, что смогу найти достаточно гибкого преподавателя, но уже на первом уроке мои сомнения
              развеялись, когда я
              увидела, насколько трудолюбив мой преподаватель, как он меня поддерживает.</p>
          </div>
        </div>
      </div>
    </section>
    <section class="start-edu">
      <div class="container">
        <h2>Изучай больше, чем просто язык!</h2>
        <p class="start-edu__text">С Fratteli вы приобретете полезные навыки, расширите свой кругозор и познакомитесь с
          потрясающими людьми.</p>
        <div class="hero__offer__button">
          <a class="start-edu__link btn" href="../web/signin.php">начать</a>
        </div>
      </div>
    </section>
  </main>
  <footer class="footer">
    <div class="container">
      <div class="footer__block">
        <h3>С нами на связи</h3>
        <div class="footer__block__socials">
          <a class="socials__link__img" href="https://twitter.com/twitter"><svg class="socials--hover" width="32"
              height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M26.66 8.91736C27.8553 8.20281 28.7496 7.07767 29.176 5.75203C28.0529 6.41843 26.8241 6.88786 25.5427 7.14003C23.7661 5.26073 20.9514 4.80339 18.6712 6.02357C16.3911 7.24374 15.21 9.83935 15.788 12.36C11.1875 12.1291 6.90131 9.95591 3.99602 6.38136C2.47981 8.99659 3.25462 12.3397 5.76669 14.0214C4.8583 13.9922 3.97006 13.7462 3.17602 13.304C3.17602 13.328 3.17602 13.352 3.17602 13.376C3.17655 16.1002 5.09652 18.4468 7.76669 18.9867C6.92411 19.2159 6.0403 19.2497 5.18269 19.0854C5.93362 21.4151 8.08076 23.0111 10.528 23.0587C8.50113 24.6495 5.99799 25.5122 3.42135 25.508C2.96465 25.5087 2.5083 25.4824 2.05469 25.4294C4.67121 27.1107 7.71651 28.0032 10.8267 28C15.1537 28.0297 19.3121 26.3239 22.3717 23.264C25.4313 20.2042 27.1368 16.0457 27.1067 11.7187C27.1067 11.4707 27.1009 11.224 27.0894 10.9787C28.21 10.1688 29.1771 9.16556 29.9454 8.01603C28.9014 8.47878 27.794 8.78259 26.66 8.91736Z"
                fill="#FFFFFF" />
            </svg>
          </a>
          <a class="socials__link__img" href="https://www.linkedin.com/feed/"><svg class="socials--hover" width="32"
              height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M17.3333 28H12V12H17.3333V14.6667C18.4702 13.2203 20.1942 12.3581 22.0333 12.316C25.3408 12.3344 28.0096 15.0258 28 18.3333V28H22.6667V19C22.4534 17.5102 21.1757 16.4048 19.6707 16.408C19.0124 16.4288 18.391 16.717 17.9499 17.2062C17.5088 17.6953 17.2862 18.3431 17.3333 19V28ZM9.33333 28H4V12H9.33333V28ZM6.66667 9.33333C5.19391 9.33333 4 8.13943 4 6.66667C4 5.19391 5.19391 4 6.66667 4C8.13943 4 9.33333 5.19391 9.33333 6.66667C9.33333 7.37391 9.05238 8.05219 8.55229 8.55229C8.05219 9.05238 7.37391 9.33333 6.66667 9.33333Z"
                fill="white" />
            </svg>
          </a>
          <a class="socials__link__img" href="https://discord.com/"><svg class="socials--hover" width="32" height="32"
              viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M26.1667 29.3333L23.444 26.9333L21.9094 25.5067L20.2867 24L20.9534 26.3453H6.59602C5.15817 26.3402 3.99633 25.1712 4.00001 23.7333V6.60933C3.9978 5.17252 5.15922 4.00515 6.59602 4H23.5707C25.0075 4.00515 26.1689 5.17252 26.1667 6.60933V29.3333ZM20.1334 18.0107C19.5711 18.7647 18.7617 19.2971 17.8467 19.5147C18.2227 19.9947 18.676 20.5373 18.68 20.5427C20.2095 20.575 21.6577 19.8556 22.556 18.6173C22.51 16.0503 21.8866 13.5265 20.732 11.2333C19.7155 10.4357 18.4782 9.97018 17.188 9.9H17.1734L16.996 10.1027C18.1484 10.4122 19.2231 10.96 20.1507 11.7107C18.9705 11.0619 17.6753 10.6489 16.3374 10.4947C15.487 10.4002 14.6283 10.4087 13.78 10.52C13.72 10.5212 13.6603 10.5274 13.6014 10.5387H13.564C12.5698 10.6531 11.5998 10.9231 10.6894 11.3387C10.2334 11.548 9.95335 11.7 9.94135 11.7053C9.92935 11.7107 9.94135 11.7053 9.94135 11.696C10.9252 10.9222 12.0602 10.3631 13.2733 10.0547L13.14 9.90267H13.132C11.8419 9.97302 10.6046 10.4385 9.58802 11.236C8.42922 13.5276 7.80557 16.0524 7.76402 18.62C8.65113 19.8665 10.1014 20.5886 11.6307 20.5453C11.6307 20.5453 12.108 19.964 12.48 19.4933C11.588 19.2692 10.802 18.7411 10.2573 18C10.2667 18.0067 10.3987 18.096 10.612 18.2133C10.6263 18.2302 10.6441 18.2438 10.664 18.2533C10.6809 18.265 10.6988 18.2753 10.7174 18.284C10.7384 18.2936 10.7585 18.3052 10.7774 18.3187C11.0748 18.4826 11.3836 18.6252 11.7014 18.7453C12.3054 18.9845 12.9303 19.1675 13.568 19.292C14.1263 19.3973 14.6932 19.4508 15.2614 19.452C15.7941 19.4519 16.3256 19.4028 16.8494 19.3053C17.4801 19.1946 18.0961 19.0121 18.6854 18.7613C19.1944 18.5656 19.68 18.3138 20.1334 18.0107ZM17.416 17.4413C16.8359 17.4919 16.2843 17.1812 16.0268 16.6589C15.7694 16.1366 15.859 15.5099 16.2524 15.0806C16.6459 14.6513 17.2625 14.5076 17.8052 14.7187C18.3479 14.9298 18.7053 15.4524 18.7054 16.0347C18.7347 16.7785 18.1583 17.4067 17.4147 17.4413H17.416ZM12.792 17.4413C12.0625 17.3777 11.5026 16.767 11.5026 16.0347C11.5026 15.3024 12.0625 14.6916 12.792 14.628C13.1281 14.629 13.4494 14.7661 13.6827 15.008C13.9474 15.2828 14.0914 15.6519 14.0827 16.0333C14.1135 16.7785 13.5357 17.4082 12.7907 17.4413H12.792Z"
                fill="white" />
            </svg>
          </a>
        </div>
      </div>
      <div class="seperator"></div>
      <div class="footer__block">
        <a href="#hero"><img src="../assets/img/logo.svg" alt="Logo"></a>
        <div class="footer__block__sign">
          <a href="../web/signin.php" class="block__text__link">Войти или зарегестрироваться</a>
        </div>
      </div>
      <p class="footer__text">[TERMS] Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit at mattis
        consectetur ante. Neque, velit fames
        sit magna sem rhoncus. Phasellus nibh ultrices nisi ut odio quam turpis dolor rutrum. Nulla ultrices vitae
        tempor non
        augue massa nisi, magna vivamus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit at mattis
        consectetur
        ante. Neque, velit fames sit magna sem rhoncus. Phasellus nibh ultrices nisi ut odio quam turpis dolo</p>
    </div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../js/slick.min.js"></script>
  <script src="../js/addClose.js"></script>
  <script src="../js/slider.js"></script>
</body>


</html>