<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?></title>
  <script>
    const baseApi = "http://fratteli/app"
    
  </script>
  <script src="../js/popup.js"></script>
  <script>
    window.onload = function() {
      initExitPopup();
    };
  </script>
  <link rel="stylesheet" href="../styles/css/components/popup.css">
  <link rel="stylesheet" href="../styles/css/reset.css">
  <link rel="stylesheet" href="../styles/css/fonts.css">
  <link rel="stylesheet" href="../styles/css/coolicons.css">
  <link rel="stylesheet" href="../styles/css/all.css">
  <link rel="stylesheet" href="../styles/css/slick.css">
  <link rel="stylesheet" href="../styles/css/slick-theme.css">
  <style>
    .test_level {
      background: #41BBFF;
      border-radius: 12px;
      display: inline-block;
      padding: 15px;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 26px;
      color: #fff;
      margin: 20px 0;
    }

    .answers-container {
      padding: 10px;
      display: flex;
      flex-direction: column;
    }
    .answer-item {
      width: 300px;
    }
    .answer-item input[type="text"] {
      width: 100px;
    }
    .questions-desc {
      border: 2px solid #ececec;
      border-radius: 10px;
      padding: 5px;
    }
    #testContainer{
      width: 500px;
    }

    input[type="text"] {
      width: 200px;
      border: 2px solid #cccccc;
      outline: none;
      border-radius: 5px;
      padding: 3px;
    }

    input[type="text"]:hover {
      border: 2px solid #454545;
    }
  </style>
</head>