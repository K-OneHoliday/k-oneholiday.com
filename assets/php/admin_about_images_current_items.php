<?php

/*
 * admin_about_images_current_items.php
 * 負責在 about_images.php 顯示「關於我們」現有圖片的腳本
 * (c) 2018 健一假期。版權所有。
 */

require "locale.php";
require "admin_verify_session_background.php";
require "credentials.php";

try {
  $k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
  foreach ($k_one->query("SELECT * FROM images") as $row) {
    echo "<tr>";
    echo "<td><a href=\"../images/uploads/" . htmlspecialchars(rawurlencode($row["img"])) . "\" target=\"_blank\">" . htmlspecialchars($row["img"]) . "</a></td>";
    echo is_null($row["pdf"]) ?
      "<td><em>沒有</em></td>" :
      "<td><a href=\"../pdf/uploads/" . htmlspecialchars(rawurlencode($row["pdf"])) . "\" target=\"_blank\">" . htmlspecialchars($row["pdf"]) . "</a></td>";
    echo is_null($row["description"]) ?
      "<td><em>沒有</em></td>" :
      "<td>" . htmlspecialchars($row["description"]) . "</td>";
    echo "<td><a class=\"button\" href=\"#\" onclick=\"event.preventDefault();deleteImageWithId({$row["id"]})\"><span class=\"icon fa fa-trash\"></span> 刪除</a></td>";
    echo "</tr>";
  }
  $k_one = NULL;
} catch (PDOException $e) {
  echo "<tr><td colspan=\"4\"><span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 嘗試連結資料庫時發生了以下錯誤，因此無法顯示有關結果：</span><br /><br /><pre><code>" . htmlspecialchars($e->getMessage()) . "</code></pre></td></tr>";
}

?>
