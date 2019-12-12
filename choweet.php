<?php

  // function
  require_once "./model/function.php";

  // データベース
  require_once "./model/db.php";

  // POSTされた情報を処理
  $choweet = $_POST["choweet"];
  $images = $_FILES["file"];

  // 文字があるか確認
  if ($choweet == "") {
    $thema = "yellow";
    $message_title = "空のチョイート";
    $message_data = "空のままチョイートできません。";
    include_once "./view/message.php";
    exit;
  }

  // 文字数上限の確認
  if (mb_strlen($choweet) > 281) {
    $thema = "red";
    $message_title = "文字数の上限";
    $message_data = "チョイートできる文字数は280文字以下でなければなりません。";
    include_once "./view/message.php";
    exit;
  }

  // ファイルがあるか確認
  if ($images["size"] != 0) {
    // ファイル形式の判定
    if (!file_type_judgment($images["type"])) {
      $thema = "red";
      $message_title = "ファイル形式非対応";
      $message_data = "チョイートしようとしているファイル形式は非対応です。<br>対応形式はJPEG PNG GIFです。<br>ファイルサイズは10MB以下";
      include_once "./view/message.php";
      exit;
    }else {
      $fileTypeExtension = fileTypeExtension($images["type"]);
      $fileName = $_SESSION["user_info"]["login_id"].time().$fileTypeExtension;
      $uploadDir = "./media/".$fileName;
      $uploadInfo = move_uploaded_file($images["tmp_name"],$uploadDir);
      if ($uploadInfo) {

        $writeInfo = choweet($_SESSION["user_info"]["login_id"],$choweet,$fileName);
        if ($writeInfo) {
          header("Location:./");
          exit;
        }

      }else {
        $thema = "red";
        $message_title = "アップロード失敗";
        $message_data = "ファイルのアップロードに失敗しました。<br>再度お試しください。";
        include_once "./view/message.php";
        exit;
      }
    }
  }else {
    $writeInfo = choweet($_SESSION["user_info"]["login_id"],$choweet,NULL);
    if ($writeInfo) {
      header("Location:./");
      exit;
    }
  }

?>
