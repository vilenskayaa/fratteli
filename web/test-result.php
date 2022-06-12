<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/css/test-result.css">
  <title>Document</title>
</head>

<?php
    $count = 0;
    if ((int)$_REQUEST['radio1'] === 1) $count++;
    if ((int)$_REQUEST['radio2'] === 1) $count++;
    if ((int)$_REQUEST['radio3'] === 1) $count++;
    if ((int)$_REQUEST['radio4'] === 1) $count++;
    if ((int)$_REQUEST['radio5'] === 1) $count++;
    if ((int)$_REQUEST['radio6'] === 1) $count++;
    if ((int)$_REQUEST['radio7'] === 1) $count++;
    if ((int)$_REQUEST['radio8'] === 1) $count++;

    $level = '';
    if ($count === 0) $level = 'A1';
    if ($count > 1) $level = 'A2';
    if ($count > 3) $level = 'B1';
    if ($count > 5) $level = 'B2';
    if ($count > 6) $level = 'C1';
    if ($count === 8) $level = 'C2';

    if ($_COOKIE['role'] === 'teacher' && $count < 7) {
        $errorMessage = 'Извините, вы не можете стать преподавателем - 
для этого уровень владения языком должен быть не ниже C1.';
    }

    setcookie('level', $level, ['path' => '/']);
?>

<body>
  <main class="main">
    <div class="content content--left">
      <img class="logo" src="/assets/img/logo.svg" alt="">
      <h1>Ваш уровень итальянского: <?= $level ?></h1>
        <?php if (isset($errorMessage)) :?>
        <p class="content__text color-red">
            <?= $errorMessage ?>
        </p>
        <?php endif; ?>
      <p class="content__text">Если вы не согласны с текущим уровнем,
        вы может пройти <a href="/web/reg-test.php">Тест</a> снова.</p>
      <?php if (isset($errorMessage)): ?>
          <a class="btn" href="/web/reg-test.php">Пройти тест заново</a>
        <?php else: ?>
        <button class="btn" id="signEnd">Далее</button>
        <?php endif; ?>
    </div>
    <div class="content content--right">
      <img class="content__background" src="/assets/img/test-result/result-back.svg" alt="">
      <div class="block"></div>
      <img class="content__img" src="/assets/img/test-result/result-img.png" alt="">
    </div>
  </main>
<script src="/js/jquery.js"></script>
<script>
    const signUp = () => {
        $(document).ready(function() {
            $("#signEnd").click(function(event) {
                console.log('dsf');
                event.preventDefault();

                $.ajax({
                    type: "post",
                    url: "/app/account/signup.php",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data) {
                            window.location.href = "/web/aproove_admin.php"
                        }
                        else {
                          window.location.href = "/web/lessons.php"
                        }
                    }
                })
            })
        })
    }
    signUp();
</script>
</body>
</html>