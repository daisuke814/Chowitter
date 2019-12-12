<?php

  // function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // GETパラメータがあるか確認。なければエラーページへ飛ばす
  if (!isset($_POST["token"])) {
    $thema = "red";
    $message_title = "不正なアドレス";
    $message_data = "トークンが存在しないため処理を実行できませんでした";
    include_once "./view/message.php";
    exit;
  }

  // データベースからトークンを照合
  $row = search_token($_POST["token"]);

  // トークンが存在しない場合はエラーページに飛ばす
  if ($row == NULL) {
    $thema = "red";
    $message_title = "存在しないトークン";
    $message_data = "すでに登録されたか、トークンが不正です。";
    include_once "./view/message.php";
    exit;
  }

  // POSTデータが正しいか確認
  if ($_POST["login_id"] == "" or $_POST["display_name"] == "") {
    $thema = "red";
    $message_title = "入力されていません";
    $message_data = "ユーザーIDまたは表示名が正しく入力されていません";
    include_once "./view/message.php";
    exit;
  }

  // 文字数の上限を確認（ユーザーID）
  if (mb_strlen($_POST["login_id"]) > 16) {
    $thema = "red";
    $message_title = "文字数が多すぎます";
    $message_data = "ユーザーIDは15文字以内<br>表示名は50文字以内<br>に設定してください";
    include_once "./view/message.php";
    exit;
  }

  if (!ctype_alnum($_POST["login_id"])) {
    $thema = "red";
    $message_title = "使用できない文字が含まれています";
    $message_data = "ユーザーIDで使用できる文字は半角英数字のみです。<br>尚、大文字と小文字は区別されます。";
    include_once "./view/message.php";
    exit;
  }

  // 文字数の上限を確認（表示名）
  if (mb_strlen($_POST["display_name"]) > 51) {
    $thema = "red";
    $message_title = "文字数が多すぎます";
    $message_data = "ユーザーIDは15文字以内<br>表示名は50文字以内<br>に設定してください";
    include_once "./view/message.php";
    exit;
  }

  // データベースに同一ユーザーIDがないか確認
  $row2 = login_id_check($_POST["login_id"]);

  // ユーザーIDが既存する場合はエラーページへ
  if ($row2 != NULL) {
    $thema = "red";
    $message_title = "すでに使われているユーザーID";
    $message_data = "入力されたユーザーIDはすでに使用されています。<br>他のユーザーIDに変更してください。";
    include_once "./view/message.php";
    exit;
  }

  // 本登録の処理
  $login_id = $_POST["login_id"];
  $login_pass = (string)$row["password"];
  $email = (string)$row["email"];
  $display_name = $_POST["display_name"];
  $response = resiting2accounts($login_id,$login_pass,$email,$display_name);
  if (!$response) {
    $thema = "red";
    $message_title = "内部エラー";
    $message_data = "本登録処理に内部エラーが発生しました。";
    include_once "./view/message.php";
    exit;
  }

  // 仮登録から削除
  $response = delete_onetime_email($email);
  if (!$response) {
    $thema = "red";
    $message_title = "内部エラー";
    $message_data = "本登録処理に内部エラーが発生しました。";
    include_once "./view/message.php";
    exit;
  }

  //
  $thema = "default";
  $message_title = "登録完了";
  $message_data = "登録ありがとうございます。<br>登録が完了しました。";
  include_once "./view/message.php";
  exit;

?>
