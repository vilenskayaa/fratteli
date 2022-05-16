<?php

session_start();
$id = $_GET["test_id"];
$page_title = "Словарь";

?>

<?php include "../layout/meta.php"; ?>

<body class="container__aside">

  <?php include "../layout/side-menu.php" ?>
  <main class="">
      <div id="create-word-form">
        <input type="text" id="word_rus" placeholder="На русском"/>
        <input type="text" id="word_italian" placeholder="На итальянском"/>
        <input type="file" id="word_picture" />
        <button id="createWord">Создать</button>
      </form>
  </main>

  <script src="../js/words.js"></script>
  <script>
      fetchWords().then(res => console.log(res))
  </script>
</body>

</html>