<?php

/*
 * admin_delete_about_image.php
 * 負責處理刪除「關於我們」圖片的腳本
 * (c) 2018 健一假期。版權所有。
 */

require "locale.php";
require "admin_verify_session_background.php";
require "credentials.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["id"]))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 刪除圖片失敗 - 請提交正確的表格</span>";
elseif (!is_numeric($_POST["id"]))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 刪除圖片失敗 - ID號碼必須是一個數值</span>";
elseif (!preg_match('/^0|[1-9]\d*$/', $_POST["id"]))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 刪除圖片失敗 - ID號碼必須是零或正整數</span>";
else
  try {
    $k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
    if ($k_one->query("SELECT COUNT(*) FROM images WHERE id = {$_POST["id"]}")->fetchColumn() !== "1")
      echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 刪除圖片失敗 - 嘗試刪除圖片時找不到相關圖片</span>";
    else {
      $row = $k_one->query("SELECT * FROM images WHERE id = {$_POST["id"]}")->fetch();
      if (!unlink("../../images/uploads/{$row["img"]}"))
        echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 刪除圖片失敗 - 請直接聯絡網站設計者或登入 GoDaddy 直接刪除有關圖片</span>";
      else {
        if (!is_null($row["pdf"]) && !unlink("../../pdf/uploads/{$row["pdf"]}"))
          echo "<span style=\"color: yellow\"><span class=\"icon fa fa-exclamation-triangle\"></span> 刪除附屬 PDF 檔案失敗 - 請直接聯絡網站設計者或登入 GoDaddy 直接刪除有關檔案</span><br /><br />";
        $deleted_rows = $k_one->query("DELETE FROM images WHERE id = {$_POST["id"]}")->rowCount();
        echo $deleted_rows === 0 ?
          "<span style=\"color: yellow\"><span class=\"icon fa fa-exclamation-triangle\"></span> 嘗試刪除圖片時找不到有關圖片</span>" :
        $deleted_rows === 1 ?
          "<span style=\"color: green\"><span class=\"icon fa fa-check\"></span> 刪除圖片成功</span>" :
          "<span style=\"color: red; font-weight: bold\"><span class=\"icon fa fa-exclamation-circle\"></span> 刪除圖片時發生了嚴重錯誤（一共刪除了 $deleted_rows 張圖片） - 請立即聯絡網站設計者</span>";
      }
    }
    $k_one = NULL;
  } catch (PDOException $e) {
    echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 刪除圖片失敗 - 嘗試連結資料庫時發生了以下錯誤：<br /><br /><pre><code>" . htmlspecialchars($e->getMessage()) . "</code></pre></span>";
  }

?>
