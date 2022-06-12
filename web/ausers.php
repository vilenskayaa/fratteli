<?php

session_start();
$page_title = "Администрирование материалов";

if (($_SESSION['user']['role'] ?? '' )!== 'admin') {
    header("Location: /index.php");
    exit;
}

?>

<?php include "../layout/meta.php"; ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/styles/css/ausers.css" rel="stylesheet"/>
    </head>

    <body>
<?php include "../layout/side-menu-admin.php" ?>
<main class="container container__aside">
    <div class="head">
        <div class="head__info">
            <div class="head__title">Пользователи</div>
            <div class="head__subtitle">Здесь можно администрировать пользователей</div>
        </div>
    </div>
    <div class="reviews__item user">
            <div class="user__name">
                <h3>Имя пользователей</h3>
            </div>
            <div class="user__email">
                <h3>Email</h3>
            </div>
            <div class="user__level">
                <h3>Уровень</h3>
            </div>
            <div class="user__approved">
                <h3>Статус</h3>
            </div>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
        </div>
    <div id="users"></div>
    <div id="pages"></div>
</main>
<script src="/js/jquery.js"></script>
<script src="/js/ausers.js"></script>
    </body>

</html>
