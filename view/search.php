<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?php include_once "./common/main_head.php"; ?>
    <script type="text/javascript">
    // 検索した文字列を格納
    var keyword = '<?php print $keyword; ?>';

    $(function(){
      $("li#choweet").highlight(keyword);
    });
    </script>
    <title>Chowitter</title>
  </head>
  <body class="top_main">
    <?php include_once "./common/main_header.php"; ?>
    <main id="main_choweet">
      <div class="wrapper">
        <div class="choweet">
          <div class="top_choweet">
            <h2><?php print  $choweet_searched; ?></h2>
            <?php foreach ($choweet as $myChoweet): ?>
              <div class="my_choweet">
                <img src="./user_icon/<?php print $myChoweet->user_icon; ?>" alt="User Icon" class="choweet_user_icon">
                <ul class="my_choweet">
                  <li><a href="./user.php?id=<?php print $myChoweet->login_id; ?>"><?php print $myChoweet->display_name; ?></a>@<?php print $myChoweet->login_id; ?></li>
                  <li id="choweet"><?php print $myChoweet->getChoweet(); print $myChoweet->imgDisp(); ?></li>
                  <li><?php print $myChoweet->time; ?></li>
                </ul>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="side_nav">
          <h2>ユーザー</h2>
          <?php foreach ($choweet as $myChoweet): ?>
          <div class="user">
            <img src="./user_icon/<?php print $myChoweet->user_icon; ?>" alt="User Icon" class="choweet_user_icon">
            <ul class="user">
              <li><a href="./user.php?id=<?php print $myChoweet->login_id; ?>"><?php print $myChoweet->display_name; ?></a></li>
              <li>@<?php print $myChoweet->login_id; ?></li>
            </ul>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </main>
    <footer>
      <div class="wrapper">

      </div>
    </footer>
    <script src="./js/vue.js" charset="utf-8"></script>
    <script src="./js/main.js" charset="utf-8"></script>
  </body>
</html>
