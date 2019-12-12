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
        <div class="myfollow">
          <h2>フォロー中のユーザー</h2>
          <?php foreach ($user as $users): ?>
          <div class="user">
            <img src="./user_icon/<?php print $users->imgDisp(); ?>" alt="User Icon" class="choweet_user_icon">
            <ul class="user">
              <li><a href="./user.php?id=<?php print $users->login_id; ?>"><?php print $users->display_name; ?></a></li>
              <li>@<?php print $users->login_id; ?></li>
              <li><?php print $users->comment; ?></li>
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
