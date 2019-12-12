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
  <body class="<?php print $thema; ?>">
    <main class="flex animated zoomIn">
      <h1><img src="./images/<?php print $thema; ?>.svg" alt="" id="logo"></h1>
      <div class="">
        <h2><?php print $message_title; ?></h2>
        <p><?php print $message_data; ?></p>
        <a href="./" class="nomal">トップへ</a>
      </div>
    </main>
    <script src="./js/vue.min.js" charset="utf-8"></script>
  </body>
</html>
