<?php

session_start();
$id = $_GET["test_id"];
$page_title = "Словарь";

?>

<?php include "../layout/meta.php"; ?>

<body>
  <?php include "../layout/side-menu.php" ?>
  <main class="container__aside">
      <form id="create-word-form" enctype="multipart/form-data">
        <input type="text" name="word_rus" placeholder="На русском"/>
        <input type="text" name="word_italian" placeholder="На итальянском"/>
        <input type="file" name="word_picture" />
        <button type="submit" id="createWord">Создать</button>
      </form>
  </main>

  <script src="/js/jquery.js"></script>
  <script src="../js/words.js"></script>
  <script>
      fetchWords().then(res => console.log(res))
  </script>
</body>

</html>