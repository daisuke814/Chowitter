<?php

  // セッション開始
  session_start();

  // ログアウト処理
  if (isset($_SESSION["user_info"])) {
    unset($_SESSION["user_info"]);
  }

  // ページ移動
  header("Location:./index.php");
  exit;

?>
