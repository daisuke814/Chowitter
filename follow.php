<?php

  // Function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // ユーザーが存在するか確認
  $isUser = id_check($_GET["id"]);
  if ($isUser == NULL) {
    $thema = "red";
    $message_title = "ユーザーは存在しません";
    $message_data = "ユーザーが存在しないためフォローできませんでした。";
    include_once "./view/message.php";
    exit;
  }

  // フォローしているか確認
  $db_follow = isFollow($_GET["id"],$_SESSION["user_info"]["id"]);
  if ($db_follow == NULL) {
    user_follow($_GET["id"],$_SESSION["user_info"]["id"]);
    $thema = "default";
    $message_title = "フォローしました。";
    $message_data = "";
    include_once "./view/message.php";
    exit;
  }else {
    user_unfollow($_GET["id"],$_SESSION["user_info"]["id"]);
    $thema = "default";
    $message_title = "フォロー解除しました。";
    $message_data = "";
    include_once "./view/message.php";
    exit;
  }

?>
