<?php

  // Function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // POST送信の確認
  if (!isset($_GET["keyword"])) {
    $thema = "red";
    $message_title = "検索キーワード未入力";
    $message_data = "検索するキーワードを入力してください、";
    include_once "./view/message.php";
    exit;
  }

  // クラス
  $choweet = search_choweet($_GET["keyword"]);  // チョイートの検索

  // エスケープ
  $keyword = htmlspecialchars($_GET["keyword"],ENT_QUOTES);

  // 検索結果
  if ($choweet == NULL) {
    $choweet_searched = "「{$keyword}」は見つかりませんでした";
  }else {
    $choweet_searched = "「{$keyword}」の検索結果";
  }

  // 自分のアイコン
  if ($_SESSION["user_info"]["user_icon"] == NULL) {
    $user_icon = "default_icon.svg";
  }else {
    $user_icon = $_SESSION["user_info"]["user_icon"];
  }

  // View
  include_once "./view/search.php";

?>
