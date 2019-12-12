<?php

  // セッション開始
  session_start();

  // ログインしているかの有無
  function login_check() {
    if (isset($_SESSION["user_info"])) {
      return true;
    }else {
      return false;
    }
  }

  // ログインしていなければindex.phpに飛ばす
  function login_check_noindex() {
    $login_check = login_check();
    if ($login_check == true) {
      exit;
    }else {
      return header("Location:./index.php");
      exit;
    }
  }

  // ログインしていればメインページに飛ばす
  function login_check_main() {
    $login_check = login_check();
    if ($login_check == false) {
      exit;
    }else {
      return header("Location:./main.php");
      exit;
    }
  }

  // メールアドレスのフォーマットが正しいか
  function check_email($email) {
    $check = (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($check == 1) {
      return true;
    }else {
      return false;
    }
  }

  // メール送信
  function send_mail($post_mailto,$post_title,$post_message) {
    //言語と文字コードを設定
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    //メールの情報を設定
    $mailto = $post_mailto;
    $title = $post_title;
    $message = $post_message;
    $option= "From:".mb_encode_mimeheader("Chowitter")."no-reply@chowitter.com";

    //メールの送信
    if(mb_send_mail($mailto,$title,$message,$option)){
    	return true;
    }else{
    	return false;
    }
  }

  // ファイル形式の識別及び判定
  function file_type_judgment($fileType) {
    $trueFileType = array('image/gif' => true,
                          'image/png' => true,
                          'image/jpeg' => true
                          );
    if (isset($trueFileType[$fileType])) {
      return $trueFileType[$fileType];
    }else {
      return false;
    }
  }

  function fileTypeExtension($fileTypeExtension) {
    $trueFileType = array('image/gif' => ".gif",
                          'image/png' => ".png",
                          'image/jpeg' => ".jpg"
                          );
    return $trueFileType[$fileTypeExtension];
  }

  // URLの確認
  function check_url($url) {
    $data = preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url);
    if ($data) {
      return true;
    }else {
      return false;
    }
  }

?>
