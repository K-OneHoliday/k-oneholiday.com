<?php

/*
 * admin_login_authentication.php
 * 處理管理員登入的腳本
 * (c) 2018 健一假期。版權所有。
 */

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["username"]) || !isset($_POST["password"]))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 登入失敗 - 請提交正確的表格</span>";
else {
  require "credentials.php";
  try {
    $k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
    if ($k_one->query("SELECT COUNT(*) FROM admins WHERE username = " . $k_one->quote($_POST["username"]))->fetchColumn() !== "1")
      echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 登入失敗 - 管理員名稱並不存在</span>";
    elseif (!password_verify($_POST["password"], $k_one->query("SELECT password_hash FROM admins WHERE username = " . $k_one->quote($_POST["username"]))->fetch()["password_hash"]))
      echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 登入失敗 - 密碼不正確</span>";
    else {
      session_start();
      $_SESSION["username"] = $_POST["username"];
      echo "<span style=\"color: green\"><span class=\"icon fa fa-check\"></span> 登入成功 - 請稍候 ... </span><script>window.location.href = \"index.php\";</script>";
    }
    $k_one = NULL;
  } catch (PDOException $e) {
    echo "<span style=\"color: red\"><p><span class=\"icon fa fa-exclamation-circle\"></span> 嘗試連接資料庫時發生了以下錯誤，因此無法將您登入：</p><p><pre><code>" .
      htmlspecialchars($e->getMessage()) .
      "</code></pre></p></span>";
    exit(0);
  }
}

?>
