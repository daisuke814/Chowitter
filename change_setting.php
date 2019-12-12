<?php

  // function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";



  // POSTされた情報を処理
  if ($_POST["display_name"] == "") {
    $thema = "red";
    $message_title = "表示名が無効です。";
    $message_data = "表示名が空です。";
    include_once "./view/message.php";
    exit;
  }

  if (mb_strlen($_POST["display_name"]) > 51) {
    $thema = "red";
    $message_title = "表示名が無効です。";
    $message_data = "文字数の上限を上回っています。<br>表示名は50文字以下にしてください。";
    include_once "./view/message.php";
    exit;
  }

  if (mb_strlen($_POST["comment"]) > 160) {
    $thema = "red";
    $message_title = "自己紹介が無効です。";
    $message_data = "自己紹介文が長すぎます。<br>自己紹介文の文字数は160文字以下にしてください。";
    include_once "./view/message.php";
    exit;
  }

  if (!$_POST["url"] == "") {
    if (!check_url($_POST["url"])) {
      $thema = "red";
      $message_title = "URLが無効";
      $message_data = "入力されたURLは無効です。";
      include_once "./view/message.php";
      exit;
    }
  }

  // アイコン画像の処理
  if ($_FILES["icon"]["size"] != 0) {
    if (!file_type_judgment($_FILES["icon"]["type"])) {
      $thema = "red";
      $message_title = "ファイル形式非対応";
      $message_data = "チョイートしようとしているファイル形式は非対応です。<br>対応形式はJPEG PNG GIFです。<br>ファイルサイズは10MB以下";
      include_once "./view/message.php";
      exit;
    }else {
      $fileTypeExtension = fileTypeExtension($_FILES["icon"]["type"]);
      $fileName = $_SESSION["user_info"]["login_id"].time().$fileTypeExtension;
      $uploadDir = "./user_icon/".$fileName;
      $uploadInfo = move_uploaded_file($_FILES["icon"]["tmp_name"],$uploadDir);
      if ($uploadInfo) {
        $user_icon = $fileName;
      }else {
        $thema = "red";
        $message_title = "アップロード失敗";
        $message_data = "ファイルのアップロードに失敗しました。<br>再度お試しください。";
        include_once "./view/message.php";
        exit;
      }
    }
  }elseif ($_FILES["icon"]["size"] == 0) {
    $user_icon = $_POST["user_icon"];
  }

  // ヘッダー画像処理
  if ($_FILES["header"]["size"] != 0) {
    if (!file_type_judgment($_FILES["header"]["type"])) {
      $thema = "red";
      $message_title = "ファイル形式非対応";
      $message_data = "チョイートしようとしているファイル形式は非対応です。<br>対応形式はJPEG PNG GIFです。<br>ファイルサイズは10MB以下";
      include_once "./view/message.php";
      exit;
    }else {
      $fileTypeExtension = fileTypeExtension($_FILES["header"]["type"]);
      $fileName = $_SESSION["user_info"]["login_id"].time().$fileTypeExtension;
      $uploadDir = "./user_header/".$fileName;
      $uploadInfo = move_uploaded_file($_FILES["header"]["tmp_name"],$uploadDir);
      if ($uploadInfo) {
        $header_image = $fileName;
      }else {
        $thema = "red";
        $message_title = "アップロード失敗";
        $message_data = "ファイルのアップロードに失敗しました。<br>再度お試しください。";
        include_once "./view/message.php";
        exit;
      }
    }
  }elseif ($_FILES["header"]["size"] == 0) {
    $header_image = $_POST["header_image"];
  }

  if ($_POST["y"] == "NULL" or $_POST["m"] == "NULL" or $_POST["d"] == "NULL") {
    $birthday = NULL;
  }else {
    $birthday = $_POST["y"]."-".$_POST["m"]."-".$_POST["d"];
  }

  // 準備
  $display_name = $_POST["display_name"];
  $url = $_POST["url"];
  $comment = $_POST["comment"];

  // 書き込み
  $changeProfile = changeProfile($display_name,$url,$comment,$user_icon,$header_image,$birthday,$_SESSION["user_info"]["login_id"]);

  // 確認
  if ($changeProfile) {
    $_SESSION["user_info"] = login_id($_SESSION["user_info"]["login_id"]);
    $thema = "default";
    $message_title = "変更完了";
    $message_data = "プロフィールの変更が完了しました。";
    include_once "./view/message.php";
    exit;
  }



?>
