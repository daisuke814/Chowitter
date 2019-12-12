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
            <img src="./user_icon/<?php print $user_icon2; ?>" alt="User Icon" id="user_icon">
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
            <ul id="action">
              <li><a href="./follow.php?id=<?php print $id; ?>" id="follow"><?php print $isFollow; ?></a></li>
              <li><a href="./report.php" id="report">通報</a></li>
            </ul>
          </ul>
          <div class="choweet">
            <h2>チョイート</h2>
            <?php foreach ($choweet as $myChoweet): ?>
              <div class="my_choweet">
                <img src="./user_icon/<?php print $myChoweet->user_icon; ?>" alt="User Icon" class="choweet_user_icon">
                <ul class="my_choweet">
                  <li><a href="./user.php?id=<?php print $myChoweet->login_id; ?>"><?php print $myChoweet->display_name; ?></a>@<?php print $myChoweet->login_id; ?></li>
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
