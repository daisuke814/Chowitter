<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?php include_once "./common/main_head.php"; ?>
    <title>Chowitter</title>
  </head>
  <body class="top_main">
    <?php include_once "./common/main_header.php"; ?>
    <main id="top_main">
      <div class="wrapper">
        <div class="accounts animated fadeInUp">
          <img src="./user_header/<?php print $header_image; ?>" alt="User Header" id="user_header">
          <div class="flex">
            <img src="./user_icon/<?php print $user_icon; ?>" alt="User Icon" id="user_icon">
            <ul id="profile">
              <li><?php print $display_name; ?><?php print $official; ?></li>
              <li><?php print $login_id; ?></li>
              <li><?php print $comment; ?></li>
              <li>URL：<a href="<?php print $url; ?>" target="_blank"><?php print $url; ?></a></li>
              <li>誕生日：<?php print $birthday; ?></li>
            </ul>
          </div>
          <div class="flex">
            <dl class="follow_count">
              <dt>フォロー</dt>
              <dd><a href="./myfollow.php"><?php print $myfollow["follow"]; ?></a></dd>
            </dl>
            <dl class="follow_count">
              <dt>フォロワー</dt>
              <dd><a href="./myfollower.php"><?php print $myfollower["follower"]; ?></a></dd>
            </dl>
          </div>
          <ul id="user">
            <a href="./setting.php" id="setting">プロフィールを編集</a>
            <a href="./" id="accounts">登録情報の編集</a>
            <a href="./logout.php" id="logout">ログアウト</a>
          </ul>
          <div class="choweet">
            <h2>チョイート</h2>
            <?php foreach ($choweet as $myChoweet): ?>
              <div class="my_choweet">
                <img src="./user_icon/<?php print $_SESSION["user_info"]["user_icon"]; ?>" alt="User Icon" class="choweet_user_icon">
                <ul class="my_choweet">
                  <li><a href="./user.php?id=<?php print $_SESSION["user_info"]["login_id"]; ?>"><?php print $_SESSION["user_info"]["display_name"]; ?></a></li>
                  <li><?php print $myChoweet->getChoweet(); print $myChoweet->imgDisp(); ?></li>
                  <li><?php print $myChoweet->time; ?></li>
                </ul>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <div class="wrapper">

      </div>
    </footer>
    <?php include_once "./common/vue.php"; ?>
  </body>
</html>
