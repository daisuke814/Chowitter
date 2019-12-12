<?php

  // function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // メールアドレスが正しくない場合はエラーページを表示
  if (!check_email($_POST["email"])) {
    $thema = "red";
    $message_title = "不正なリクエスト";
    $message_data = "メールアドレスが不正です。";
    include_once "./view/message.php";
    exit;
  }

  // すでに登録されているか確認
  $check_accounts_email = check_accounts_email($_POST["email"]);    // 本登録しているか
  if (!$check_accounts_email) {
    $thema = "red";
    $message_title = "登録できません";
    $message_data = "すでに登録されているメールアドレスです。";
    include_once "./view/message.php";
    exit;
  }

  // 仮登録している場合はデータベースの1レコードを削除し新規トークンの作成並びにメールの送信を行う
  $check_onetime_email = check_onetime_email($_POST["email"]);    // 仮登録しているか
  if (!$check_onetime_email) {
    if (!delete_onetime_email($_POST["email"])) {
      $thema = "red";
      $message_title = "内部エラー";
      $message_data = "データベースのエラーが発生しました。もう一度お試しください";
      include_once "./view/message.php";
      exit;
    }
  }

  // トークンの生成（ランダムの英数字20文字とタイムスタンプ）
  $token = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 20).time();

  // トークンと作成時間をデータベースに格納
  $registing = registing($token,$_POST["email"],$_POST["password"]);
  if (!$registing) {
    $thema = "red";
    $message_title = "内部エラー";
    $message_data = "データベースのエラーが発生しました。もう一度お試しください";
    include_once "./view/message.php";
    exit;
  }

  // メールの内容を定義
  $token_url = "https://xrecruit3072.xsrv.jp/source/signup_check.php?token={$token}";
  $title = "本人確認";
  $message =
  "
    Chowitterのメールの確認を行ってください。\n
    以下のURLから認証してください。\n
    {$token_url}
  ";

  $check_send_mail = send_mail($_POST["email"],$title,$message);

  if (!$check_send_mail) {
    $thema = "red";
    $message_title = "送信失敗";
    $message_data = "本人確認メールの送信に失敗しました。もう一度お試しください。";
    include_once "./view/message.php";
    exit;
  }

  // メッセージの設定
  $thema = "default";
  $message_title = "仮登録が完了しました";
  $message_data = "本人確認のメールを送信しました。<br>メールを確認してください。";

  include_once "./view/message.php";

?>
