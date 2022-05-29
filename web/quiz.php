<?php

session_start();
$id = $_GET["test_id"];
$page_title = "Тест";

?>

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