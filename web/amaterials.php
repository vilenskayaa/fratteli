<?php

session_start();
$page_title = "Администрирование материалов";

if ($_SESSION['user']['role'] ?? '' !== 'admin') {
    header("Location: /index.php");
    exit;
}

?>

<?php include "../layout/meta.php"; ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/styles/css/amaterials.css" rel="stylesheet"/>
</head>

<body>
  <?php include "../layout/side-menu-admin.php" ?>
  <main class="container container__aside">
    <div class="head">
      <div class="head__info">
        <div class="head__title">Материалы</div>
        <div class="head__subtitle">Здесь можно загрузить блоги и карточки слов</div>
      </div>
    </div>
    <div class="">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="flash-message"><?= $_SESSION['message'] ?></div>
    <?php endif; unset($_SESSION['message']); ?>
      <div class="amat">
        <h2>Блог</h2>
        <form class="form" action="/app/posts/create-post.php" method="post" id="title" enctype="multipart/form-data">
          <div class="form__fields">
            <div class="form__item">
              <input class="form__input" name="post_header" type="text" placeholder="Название статьи" required>
            </div>

            <textarea class="form__input" name="post_text" rows="6" placeholder="Напишите текст статьи" required <?=$disabled?>></textarea>
            <input type="file" name="post_picture" style="" id="file-post">

            <button type="button" class="add__img" id="blogAddImageButton">
                Добавить картинку
            </button>
            <button type="submit" class="form__btn" id="blogAddButton">
                    Опубликовать
                  </button>
          </div>
        </form>

        <h2>Карточка слов</h2>
        <form class="form" action="/app/word/create-word.php" method="post" id="title" enctype="multipart/form-data">
          <div class="form__fields">
            <div class="form__item">
              <input class="form__input" name="word_italian" type="text" placeholder="Слово на итальянском" required>
            </div>

            <div class="form__item">
              <input class="form__input" name="word_rus" type="text" placeholder="Слово на русском" required>
            </div>
              <input type="file" name="word_picture" style="" id="file-post2">
            <button type="button" class="add__img" id="blogAddImageButton2">
                    Добавить картинку
                  </button>      
            <button type="submit" class="form__btn" id="blogAddButton2">
                    Опубликовать
                  </button>
                </form>
          </div>
        </div>
    </div>
  </main>
<script src="/js/jquery.js"></script>
<script src="/js/amaterials.js"></script>
</body>

</html>