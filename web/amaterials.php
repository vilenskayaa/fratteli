<?php

session_start();
$page_title = "Администрирование материалов"

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
      <div class="amat">
        <h2>Блог</h2>
        <form class="form" action="" id="title">
          <div class="form__fields">
            <div class="form__item">
              <input class="form__input" name="test_title" type="text" placeholder="Название статьи" required>
            </div>
            
            <form action="" method="" class="blog__form">
            <textarea class="form__input" name="blog_text" rows="6" placeholder="Напишите текст статьи" required <?=$disabled?>></textarea>
            <button type="add__img" class="add__img" id="blogAddImageButton">
                    Добавить картинку
                  </button>      
            <button type="submit" class="form__btn" id="blogAddButton">
                    Опубликовать
                  </button>
                </form>
          </div>


          <h2>Карточка слов</h2>
        <form class="form" action="" id="title">
          <div class="form__fields">
            <div class="form__item">
              <input class="form__input" name="test_title" type="text" placeholder="Слово на итальянском" required>
            </div>

            <div class="form__item">
              <input class="form__input" name="test_title" type="text" placeholder="Слово на русском" required>
            </div>
            
            <button type="add__img" class="add__img" id="blogAddImageButton">
                    Добавить картинку
                  </button>      
            <button type="submit" class="form__btn" id="blogAddButton">
                    Опубликовать
                  </button>
                </form>
          </div>


        </div>
    </div>
  </main>
</body>

</html>