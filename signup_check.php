<?php

  // function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // GETパラメータがあるか確認。なければエラーページへ飛ばす
  if (!isset($_GET["token"])) {
    $thema = "red";
    $message_title = "不正なアドレス";
    $message_data = "トークンが存在しないため処理を実行できませんでした";
    include_once "./view/message.php";
    exit;
  }

  // データベースからトークンを照合
  $row = search_token($_GET["token"]);

  // トークンが存在しない場合はエラーページに飛ばす
  if ($row == NULL) {
    $thema = "red";
    $message_title = "存在しないトークン";
    $message_data = "すでに登録されたか、トークンが不正です。";
    include_once "./view/message.php";
    exit;
  }

  // トークンが存在する場合は本登録画面
  include_once "./view/signup_main.php";

?>
