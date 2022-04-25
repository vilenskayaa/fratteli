<?php

session_start();
$id = $_GET["test_id"];
$page_title = "Тест";

?>

<?php include "../layout/meta.php"; ?>

<body class="container__aside">
  
<?php include "../layout/side-menu.php" ?>
  <main class="">
      <div id="testContainer"></div>
  </main>

  <script src="../js/quiz/get-one-quiz.js"></script>
</body>

</html>