<?php

  // function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // ユーザー名からユーザー情報を取得
  $row = login_id($_POST["login_id"]);

  // ログインIDの有無確認
  if ($row == NULL) {
    $thema = "red";
    $message_title = "存在しないユーザーID";
    $message_data = "入力されたユーザーIDまたはメールアドレスは存在しないか誤っています。";
    include_once "./view/message.php";
    exit;
  }

  // パスワードの照合
  $check_password = password_verify($_POST["password"],$row["login_password"]);
  if (!$check_password) {
    $thema = "red";
    $message_title = "パスワードが違います";
    $message_data = "入力されたパスワードに誤りがあるようです。";
    include_once "./view/message.php";
    exit;
  }

  // セッション作成
  $_SESSION["user_info"] = $row;

  // メインページに移動
  header("Location:./index.php");
  exit;


?>
