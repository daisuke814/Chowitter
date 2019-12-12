<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/ress.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="./js/bootstrap.min.js" charset="utf-8"></script>
    <script src="./js/script.js" charset="utf-8"></script>
    <title>Chowitter</title>
  </head>
  <body class="default">
    <main class="flex animated zoomIn">
      <h1><img src="./images/default.svg" alt="" id="logo"></h1>
      <form class="" action="signup_main_last.php" method="post">
        <h2>基本設定</h2>
        <input type="hidden" name="token" value="<?php print $_GET["token"]; ?>">
        <input type="text" class="form-control" name="login_id" value="" placeholder="ユーザーID">
        <input type="text" class="form-control" name="display_name" value="" placeholder="表示名">
        <button type="submit" class="ch_button">作成</button>
      </form>
    </main>
    <script src="./js/vue.min.js" charset="utf-8"></script>
  </body>
</html>
