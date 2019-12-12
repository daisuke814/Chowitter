<?php

  class Choweet
  {
    // Public
    public $id;
    public $login_id;
    public $choweet;
    public $images;
    public $time;

    // function
    public function imgDisp() {
      if ($this->images == NULL) {
        return "";
      }else {
        return "<img src='./media/{$this->images}' alt='Choweet Images' class='choweet_img'>";
      }
    }

    public function getChoweet() {
      $choweet = htmlspecialchars($this->choweet);
      return nl2br($choweet);
    }

  }

  class followChoweet
  {
    // Public
    public $id;
    public $login_id;
    public $display_name;
    public $user_icon;
    public $choweet;
    public $images;
    public $time;

    // function
    public function imgDisp() {
      if ($this->images == NULL) {
        return "";
      }else {
        return "<img src='./media/{$this->images}' alt='Choweet Images' class='choweet_img'>";
      }
    }

    public function getChoweet() {
      $choweet = htmlspecialchars($this->choweet);
      return nl2br($choweet);
    }

  }

  class myfollow
  {
    // Public
    public $id;
    public $login_id;
    public $display_name;
    public $user_icon;
    public $comment;

    // function
    public function imgDisp() {
      if ($this->user_icon == NULL) {
        return "default_icon.svg";
      }else {
        return $this->user_icon;
      }
    }
  }

?>
