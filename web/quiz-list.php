<?php

session_start();
$page_title = "Тесты"

?>

<?php include "../layout/meta.php"; ?>

<style>
    .test_list {
        display: flex;
    }

    .card {
        background-color: #fff;
        background: #FFFFFF;
        border-radius: 16px;
        width: 250px;
        margin: 20px;
        border: 1px solid #ececec;
        padding: 30px;
    }

    .test_title {
        font-weight: 600;
        font-size: 28px;
        line-height: 32px;
        margin: 20px 0;
    }

    .black_arrow {
        padding: 15px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #2E3134;
        display: inline-block;
        border: none;
        outline: none;
        transition-duration: 0.2s;
    }

    .black_arrow:hover {
        background: #4D62ED;
        width: 48px;
        height: 48px;
    }

    .black_arrow:hover {
        cursor: pointer;
    }

    .test_bottom {
        display: flex;
        justify-content: space-between;
    }

    .test_info {
        display: flex;
        flex-direction: column;
    }

    a {
        text-decoration: none;
    }
</style>

<body>
  <?php include "../layout/side-menu.php" ?>
  <main class="container container__aside">
        <div class="head">
            <div class="head__info">
                <div class="head__title">Тесты</div>
                <div class="head__subtitle"></div>
            </div>
            <div class="head__nav">
                <a href="quiz-add.php" class="btn" data-add>
                    Создать тест
                </a>
            </div>
        </div>


        <div id="testList" class="test_list"></div>

    </main>


    <script src="../js/quiz/quiz.js"></script>
</body>

</html>