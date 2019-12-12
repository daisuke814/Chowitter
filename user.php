<?php

  // Function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // GETパラメータを確認
  if (!isset($_GET["id"])) {
    $thema = "red";
    $message_title = "不正なリクエスト";
    $message_data = "不正なリクエストです。";
    include_once "./view/message.php";
    exit;
  }

  // 自分か否か確認
  if ($_SESSION["user_info"]["login_id"] == $_GET["id"]) {
    header("Location:./accounts.php");
    exit;
  }

  // ユーザーを照合
  $row = login_id_check($_GET["id"]);

  // ユーザーがいるか確認
  if ($row == NULL) {
    $row2 = id_check($_GET["id"]);
    if ($row2 == NULL) {
      $thema = "yellow";
      $message_title = "ユーザーは存在しません";
      $message_data = "ユーザーは存在しませんでした。";
      include_once "./view/message.php";
      exit;
    }else {
      $row = $row2;
    }
  }

  // バインド
  if ($row["header_image"] == NULL) {
    $header_image = "default.svg";
  }else {
    $header_image = $row["header_image"];
  }
  if ($row["user_icon"] == NULL) {
    $user_icon2 = "default_icon.svg";
  }else {
    $user_icon2 = $row["user_icon"];
  }
  if ($row["official"] == "yes") {
    $official = "<img src='./images/official.svg' alt='Official' id='official'>";
  }else {
    $official = "";
  }
  $display_name = $row["display_name"];
  $id = $row["id"];
  $login_id = $row["login_id"];
  $url = $row["url"];
  $comment = $row["comment"];
  $birthday = $row["birthday"];

  // フォローしているか確認
  $db_follow = isFollow($id,$_SESSION["user_info"]["id"]);
  if ($db_follow) {
    $isFollow = "フォロー中";
  }else {
    $isFollow = "フォロー";
  }

  // フォロー数の取得
  $myfollow = myFollowCount($id);

  // フォロワー数の取得
  $myfollower = myFollowerCount($id);

  // クラス
  $choweet = userChoweet($login_id);

  // 自分のアイコン
  if ($_SESSION["user_info"]["user_icon"] == NULL) {
    $user_icon = "default_icon.svg";
  }else {
    $user_icon = $_SESSION["user_info"]["user_icon"];
  }

  // View
  include_once "./view/user.php";

?>
