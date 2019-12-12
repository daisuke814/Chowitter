<?php

  // クラスの読み込み
  require_once "class.php";

  // MySQLへの接続情報
  const HOST = "localhost";
  const USER = "root";
  const PASS = "root";
  const DBNAME = "chowitter";

  // Xserver MySQL
  // const HOST = "mysql3008.xserver.jp";
  // const USER = "xrecruit3072_8ml";
  // const PASS = "xsffjm4q5g";
  // const DBNAME = "xrecruit3072_recruit";

  // MySQL接続
  function db_connect() {
  	$con = mysqli_connect(HOST, USER, PASS) or die("接続失敗");
  	mysqli_set_charset($con, "utf8");
  	mysqli_select_db($con, DBNAME);
  	return $con;
  }

  // MySQL切断
  function db_close($con) {
  	mysqli_close($con);
  }

  // 新規アカウント作成処理 -- トークン・作成時間・メールアドレスを格納
  function check_accounts_email($email) {
    $con = db_connect();
  	$sql = "SELECT * FROM accounts WHERE email = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $email);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    if ($row == NULL) {
      return true;
    }else {
      return false;
    }
  }

  // 新規アカウント作成処理 -- トークン・作成時間・メールアドレスを格納
  function check_onetime_email($email) {
    $con = db_connect();
  	$sql = "SELECT * FROM registing WHERE email = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $email);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    if ($row == NULL) {
      return true;
    }else {
      return false;
    }
  }

  // 新規アカウント作成処理 -- トークン・作成時間・メールアドレスを格納
  function registing($token,$email,$password) {
    $password = password_hash($password,PASSWORD_DEFAULT);
    $con = db_connect();
  	$sql = "INSERT INTO registing (token,email,password,time) VALUES (?,?,?,NOW())";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 'sss', $token,$email,$password);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    if ($result == NULL) {
      return true;
    }else {
      return false;
    }
  }

  // 新規アカウント作成処理 -- トークン・作成時間・メールアドレスを格納
  function delete_onetime_email($email) {
    $con = db_connect();
  	$sql = "DELETE FROM registing WHERE email = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $email);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    if ($result == NULL) {
      return true;
    }else {
      return false;
    }
  }

  // トークンの検索
  function search_token($token) {
    $con = db_connect();
  	$sql = "SELECT * FROM registing WHERE token = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $token);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $row;
  }

  // トークンの検索
  function login_id($login_id) {
    $con = db_connect();
    $sql = "SELECT * FROM accounts WHERE login_id = ? OR email = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $login_id,$login_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);
    db_close($con);
    return $row;
  }

  // 本登録処理
  function resiting2accounts($login_id,$login_pass,$email,$display_name) {
    $con = db_connect();
  	$sql = "INSERT INTO accounts (login_id, login_password, email, display_name, official, privacy, status) VALUES (?,?,?,?,'no','off','active')";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 'ssss', $login_id,$login_pass,$email,$display_name);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    if ($result == NULL) {
      return true;
    }else {
      return false;
    }
  }

  // ユーザーIDから検索
  function login_id_check($login_id) {
    $con = db_connect();
  	$sql = "SELECT * FROM accounts WHERE login_id = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $login_id);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $row;
  }

  // ユーザーIDから検索
  function id_check($id) {
    $con = db_connect();
  	$sql = "SELECT * FROM accounts WHERE id = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 'i', $id);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $row;
  }

  // チョイート投稿を格納
  function choweet($login_id,$choweet,$images) {
    $con = db_connect();
    $sql = "INSERT INTO choweet (login_id,choweet,images,time) VALUES (?,?,?,NOW())";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $login_id,$choweet,$images);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    db_close($con);
    if ($result == NULL) {
      return true;
    }else {
      return false;
    }
  }

  // チョイートを取得
  function myChoweet($login_id) {
    $con = db_connect();
  	$sql = "SELECT * FROM choweet WHERE login_id = ? ORDER BY time DESC LIMIT 20";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $login_id);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
      $choweet = new Choweet();
      $choweet->id = $row["id"];
      $choweet->login_id = $row["login_id"];
      $choweet->choweet = $row["choweet"];
      $choweet->images = $row["images"];
      $choweet->time = $row["time"];
      $data[] = $choweet;
    }
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $data;
  }

  // ユーザーチョイートの取得
  function userChoweet($login_id) {
    $con = db_connect();
  	$sql = "SELECT * FROM `choweet` INNER JOIN `accounts` ON choweet.login_id = accounts.login_id AND choweet.login_id = ? ORDER BY time DESC";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $login_id);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
      $choweet = new followChoweet();
      $choweet->id = $row["id"];
      $choweet->login_id = $row["login_id"];
      $choweet->user_icon = $row["user_icon"];
      $choweet->display_name = $row["display_name"];
      $choweet->choweet = $row["choweet"];
      $choweet->images = $row["images"];
      $choweet->time = $row["time"];
      $data[] = $choweet;
    }
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $data;
  }

  // フォロー中のユーザーを取得
  function myfollow($id) {
    $con = db_connect();
  	$sql = "SELECT accounts.*,follow.login_id AS follow_login_id
            FROM follow
            INNER JOIN `accounts`
            ON follow.follow_accounts = accounts.id
            AND follow.login_id = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 'i', $id);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
      $choweet = new myfollow();
      $choweet->id = $row["id"];
      $choweet->login_id = $row["login_id"];
      $choweet->user_icon = $row["user_icon"];
      $choweet->display_name = $row["display_name"];
      $choweet->comment = $row["comment"];
      $data[] = $choweet;
    }
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $data;
  }

  // フォロー中のユーザーを取得
  function myfollower($id) {
    $con = db_connect();
  	$sql = "SELECT accounts.*,follow.login_id AS follow_login_id
            FROM follow
            INNER JOIN `accounts`
            ON follow.login_id = accounts.id
            AND follow.follow_accounts = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 'i', $id);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
      $choweet = new myfollow();
      $choweet->id = $row["id"];
      $choweet->login_id = $row["login_id"];
      $choweet->user_icon = $row["user_icon"];
      $choweet->display_name = $row["display_name"];
      $choweet->comment = $row["comment"];
      $data[] = $choweet;
    }
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $data;
  }

  // フォローしているか
  function isFollow($user,$login_id) {
    $con = db_connect();
    $sql = "SELECT * FROM follow WHERE login_id = ? AND follow_accounts = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $login_id,$user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);
    db_close($con);
    return $row;
  }

  // ユーザーをフォローする
  function user_follow($user,$login_id) {
    $con = db_connect();
    $sql = "INSERT INTO follow (login_id,follow_accounts)
            VALUES (?,?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $login_id,$user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    db_close($con);
    if ($result == NULL) {
      return true;
    }else {
      return false;
    }
  }

  // ユーザーをフォロー解除する
  function user_unfollow($user,$login_id) {
    $con = db_connect();
    $sql = "DELETE FROM follow
            WHERE login_id = ?
            AND follow_accounts = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $login_id,$user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    db_close($con);
    if ($result == NULL) {
      return true;
    }else {
      return false;
    }
  }

  // フォロー中のチョイートを取得
  function follow_choweet($id) {
    $con = db_connect();
  	$sql = "SELECT accounts.*,choweet.*,follow.id,follow.login_id AS follow_login_id
            FROM `choweet`
            INNER JOIN `accounts`
            ON choweet.login_id = accounts.login_id
            INNER JOIN `follow`
            ON accounts.id = follow.follow_accounts
            AND follow.login_id = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $id);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
      $choweet = new followChoweet();
      $choweet->id = $row["id"];
      $choweet->login_id = $row["login_id"];
      $choweet->user_icon = $row["user_icon"];
      $choweet->display_name = $row["display_name"];
      $choweet->choweet = $row["choweet"];
      $choweet->images = $row["images"];
      $choweet->time = $row["time"];
      $data[] = $choweet;
    }
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $data;
  }

  function changeProfile($display_name,$url,$comment,$user_icon,$header_image,$birthday,$login_id) {
    $con = db_connect();
    $sql = "UPDATE accounts
            SET display_name = ?,url = ?,comment = ?,user_icon = ?,header_image = ?,birthday = ?
            WHERE login_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssss', $display_name,$url,$comment,$user_icon,$header_image,$birthday,$login_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    db_close($con);
    if ($result == NULL) {
      return true;
    }else {
      return false;
    }
  }

  function search_choweet($keyword) {
    $keyword = "%".$keyword."%";
    $con = db_connect();
  	$sql = "SELECT * FROM choweet
            INNER JOIN `accounts` ON choweet.login_id = accounts.login_id
            AND choweet LIKE ?
            ORDER BY time DESC";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 's', $keyword);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
      $choweet = new followChoweet();
      $choweet->id = $row["id"];
      $choweet->login_id = $row["login_id"];
      $choweet->user_icon = $row["user_icon"];
      $choweet->display_name = $row["display_name"];
      $choweet->choweet = $row["choweet"];
      $choweet->images = $row["images"];
      $choweet->time = $row["time"];
      $data[] = $choweet;
    }
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $data;
  }

  // フォロワー数の取得
  function myFollowCount($id) {
    $con = db_connect();
    $sql = "SELECT COUNT(login_id) AS follow
            FROM follow
            WHERE login_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);
    db_close($con);
    return $row;
  }

  // フォロワー数の取得
  function myFollowerCount($id) {
    $con = db_connect();
    $sql = "SELECT COUNT(follow_accounts) AS follower
            FROM follow
            WHERE follow_accounts = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);
    db_close($con);
    return $row;
  }

























  // ファイルをデータベースに格納する関数
  function upload_file_mysql($name, $file, $type, $size, $password) {
    $con = db_connect();
    $null = null;
    $sql = "INSERT INTO file (data,name,type,size,password,time) VALUES (?,?,?,?,?,NOW())";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'bssis', $null, $name, $type, $size, $password);
    mysqli_stmt_send_long_data($stmt, 0, $file);		// データをブロックで送信する。		参考（http://cnd.law.tohoku.ac.jp/manual/php/mysqli-stmt.send-long-data.html）
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $sql = "SELECT LAST_INSERT_ID() AS `id`";
    $result = mysqli_query($con,$sql);
    $result = mysqli_fetch_array($result);
    db_close($con);
    return $result;
  }

  // 指定されたファイルとファイル情報を取得
  function get_file_info($id) {
  	$con = db_connect();
  	$sql = "SELECT * FROM file WHERE id = ?";
  	$stmt = mysqli_prepare($con, $sql);
  	mysqli_stmt_bind_param($stmt, 'i', $id);
  	mysqli_stmt_execute($stmt);
  	$result = mysqli_stmt_get_result($stmt);
  	$row = mysqli_fetch_array($result);
  	mysqli_stmt_close($stmt);
  	db_close($con);
    return $row;
  }

?>
