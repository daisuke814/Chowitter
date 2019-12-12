<?php

  // Function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // フォローユーザーの取得
  $user = myfollower($_SESSION["user_info"]["id"]);

  // 自分のアイコン
  if ($_SESSION["user_info"]["user_icon"] == NULL) {
    $user_icon = "default_icon.svg";
  }else {
    $user_icon = $_SESSION["user_info"]["user_icon"];
  }

  // View
  include_once "./view/myfollow.php";

?>
