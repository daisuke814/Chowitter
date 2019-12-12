<?php

  // Function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // バインドするデータ
  $display_name = htmlspecialchars($_SESSION["user_info"]["display_name"],ENT_QUOTES);      // 表示名
  $login_id = htmlspecialchars($_SESSION["user_info"]["login_id"],ENT_QUOTES);              // ユーザーID
  $comment = htmlspecialchars($_SESSION["user_info"]["comment"],ENT_QUOTES);                // 自己紹介文
  $url = htmlspecialchars($_SESSION["user_info"]["url"],ENT_QUOTES);                        // Webサイトリンク
  $birthday = htmlspecialchars($_SESSION["user_info"]["birthday"],ENT_QUOTES);              // 誕生日
  $header_image = "default.svg";
  $user_icon = "default_icon.svg";

  if ($_SESSION["user_info"]["header_image"] != NULL) {
    $header_image = $_SESSION["user_info"]["header_image"];
  }

  if ($_SESSION["user_info"]["user_icon"] != NULL) {
    $user_icon = $_SESSION["user_info"]["user_icon"];
  }

  // View
  include_once "./view/setting.php";

?>
