<header id="main">
  <div class="wrapper">
    <ul id="gnav">
      <li v-for="item in nav"><a href="{{ item.link }}">{{ item.title }}</a></li>
    </ul>
    <img src="./images/main_logo.svg" alt="" id="main_logo">
    <ul id="tools">
      <li>
        <form class="" action="./search.php" method="get">
          <input type="text" name="keyword" value="" placeholder="検索">
          <button type="submit" id="search"><img src="./images/search_icon.png" alt="検索"></button>
        </form>
      </li>
      <li><a href="./accounts.php"><img src="./user_icon/<?php print $user_icon; ?>" alt="User Icon" id="user_icon"></a></li>
      <li><a href="#choweet_window" rel="modal:open" id="choweet_button">チョイート</a></li>
    </ul>
  </div>
</header>
<div id="choweet_window" class="modal">
  <form class="choweet" action="./choweet.php" method="post" enctype="multipart/form-data">
    <div class="flex">
      <h2>チョイートする</h2>
      <button type="submit" id="choweet">送信</button>
    </div>
    <textarea name="choweet" class="form-control" placeholder="今なにちてる？"></textarea>
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <input type="file" name="file" value="">
  </form>
</div>
