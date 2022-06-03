<?php

session_start();
$id = $_GET["test_id"];
$page_title = "Тест";

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/css/all.css">
</head>

<?php include "../layout/meta.php"; ?>

<body>
  <?php include "../layout/side-menu.php" ?>
  <main class="container__aside">
    <div id="testContainer"></div>
    <div class="" id="result"></div>
  </main>

  <script src="../js/quiz/get-one-quiz.js"></script>
</body>

</html>