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
        <div class="accounts animated fadeIn">
          <img src="./user_header/<?php print $header_image; ?>" alt="User Header" id="user_header">
          <div class="flex2">
            <img src="./user_icon/<?php print $user_icon; ?>" alt="User Icon" id="user_icon">
            <form class="" action="./change_setting.php" method="post" enctype="multipart/form-data">
              <ul id="change_profile">
                <li><input type="text" class="form-control" name="display_name" value="<?php print $display_name; ?>" placeholder="表示名"></li>
                <li><?php print $login_id; ?></li>
                <li><input type="text"class="form-control" name="url" value="<?php print $url; ?>" placeholder="URL"></li>
                <li><?php print $comment; ?></li>
                <li>誕生日</li>
                <li>
                  <select class="form-control" name="y">
                    <option value="NULL" selected>年</option>
                    <?php
                    for ($i=1900; $i < 2020; $i++) {
                      print "<option value='{$i}'>{$i}年</option>";
                    }
                    ?>
                  </select>
                  <select class="form-control" name="m">
                    <option value="NULL" selected>-月</option>
                    <?php
                      for ($i=1; $i < 13; $i++) {
                        print "<option value='{$i}'>{$i}月</option>";
                      }
                    ?>
                  </select>
                  <select class="form-control" name="d">
                    <option value="NULL" selected>-日</option>
                    <?php
                      for ($i=1; $i < 32; $i++) {
                        print "<option value='{$i}'>{$i}日</option>";
                      }
                    ?>
                  </select>
                </li>
                <li>プロフィール画像</li>
                <li><input type="file" name="icon" value=""></li>
                <input type="hidden" name="user_icon" value="<?php print $user_icon; ?>">
                <li>ヘッダー画像</li>
                <li><input type="file" name="header" value=""></li>
                <input type="hidden" name="header_image" value="<?php print $header_image; ?>">
                <li>自己紹介</li>
                <li><textarea name="comment" class="form-control" placeholder=""><?php print $comment; ?></textarea></li>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <li><button type="submit" id="save">保存</button></li>
              </ul>
            </form>
          </div>
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
