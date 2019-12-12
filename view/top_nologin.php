<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?php include_once "./common/main_head.php"; ?>
    <title>Chowitter</title>
  </head>
  <body class="index">
    <main class="index caption">
      <div class="caption">
        <h1><img src="./images/chowitter.png" alt="Chowitter"></h1>
      </div>
    </main>
    <main class="index login animated fadeIn">
      <form class="" action="login.php" method="post">
        <h2>今何が起きてるのか見つけましょう！</h2>
        <input type="text" class="form-control" name="login_id" value="" placeholder="メールアドレスまたはユーザー名">
        <input type="password" class="form-control" name="password" value="" placeholder="パスワード">
        <button type="submit" class="ch_button">ログイン</button>
        <a href="./" class="nomal">パスワードを忘れた場合はこちら</a>
        <a href="./signup.php" class="signup">アカウント作成</a>
      </form>
    </main>
    <?php include_once "./common/vue.php"; ?>
  </body>
</html>
