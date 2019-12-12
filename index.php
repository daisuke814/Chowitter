<?php

  // Function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // ログインしているか確認
  $login_check = login_check();

  // ログイン処理
  if (!$login_check) {
    // View
    include_once "./view/top_nologin.php";  // Chowitterにログインしていない
    exit;
  }else {

    // アイコン
    $user_icon = "default_icon.svg";

    // アイコン画像の有無判定
    if ($_SESSION["user_info"]["user_icon"] != NULL) {
      $user_icon = $_SESSION["user_info"]["user_icon"];
    }

    // クラス
    $choweet = follow_choweet($_SESSION["user_info"]["id"]);

    // View
    include_once "./view/chowitter_top.php";  // Chowitterにログインいる
    exit;
  }

?>
