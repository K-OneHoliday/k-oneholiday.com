<?php

/*
 * admin_verify_session.php
 * 負責為主要頁面驗證管理員登入的腳本
 * (c) 2018 健一假期。版權所有。
 */

session_start();
if (!isset($_SESSION["username"])) {
  // 未設置會話用戶名 - 管理員肯定未登錄
  // 毀滅會話並把用戶重新導向至 login.php
  session_destroy();
  header("Location: login.php");
} else {
  // 確認會話用戶名稱實屬管理員（防止黑客使用假管理員名稱隨意改動網站內容）
  require "../assets/php/credentials.php";
  try {
    $k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
    if ($k_one->query("SELECT COUNT(*) FROM admins WHERE username = " . $k_one->quote($_SESSION["username"]))->fetchColumn() !== "1") {
      // 會話用戶名稱並非屬實 - 把虛假管理員登出並重新導向至 login.php
      session_destroy();
      header("Location: login.php");
    }
    $k_one = NULL;
  } catch (PDOException $e) {
    echo "<span style=\"color: red\"><p><span class=\"icon fa fa-exclamation-circle\"></span> 嘗試連接資料庫時發生了以下錯誤，因此無法顯示此頁面：</p><p><pre><code>" .
      htmlspecialchars($e->getMessage()) .
      "</code></pre></p></span>";
    exit(0);
  }
}

?>
