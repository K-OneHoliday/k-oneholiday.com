<?php

/*
 * admin_add_about_image.php
 * 負責處理新增「關於我們」圖片的腳本
 * (c) 2018 健一假期。版權所有。
 */

require "locale.php";
require "admin_verify_session_background.php";
require "credentials.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_FILES["img"]))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 請選擇一張圖片上載</span>";
elseif ($_FILES["img"]["error"] !== UPLOAD_ERR_OK)
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試上載圖片時發生了以下錯誤：" . array(
    UPLOAD_ERR_INI_SIZE => "圖片大小大於系統允許上限",
    UPLOAD_ERR_FORM_SIZE => "圖片大小大於表格允許上限",
    UPLOAD_ERR_PARTIAL => "圖片上載不完整",
    UPLOAD_ERR_NO_FILE => "請選擇一張圖片上載",
    UPLOAD_ERR_NO_TMP_DIR => "系統缺少一個臨時檔案夾",
    UPLOAD_ERR_CANT_WRITE => "嘗試把圖片寫進硬碟失敗",
    UPLOAD_ERR_EXTENSION => "某一個 PHP 擴展阻止了圖片上載"
  )[$_FILES["img"]["error"]] . "<br /><br />如果以上錯誤並不是因為檔案太大或缺少圖片，請立即聯絡網站設計者。</span>";
elseif (!preg_match('/\.(png|gif|jpe?g)$/i', $_FILES["img"]["name"]))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 您的圖片檔案名稱必須以 <code>.png</code>/<code>.gif</code>/<code>.jpg</code>/<code>.jpeg</code> 完結（不分大小寫）</span>";
elseif (file_exists("../../images/uploads/" . basename($_FILES["img"]["name"])))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 上載圖片名稱已存在</span>";
elseif (!move_uploaded_file($_FILES["img"]["tmp_name"], "../../images/uploads/" . basename($_FILES["img"]["name"])))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試把上載圖片搬移到 <code>/images/uploads/</code> 失敗，請立即聯絡網站設計者</span>";
elseif (!isset($_FILES["pdf"]) || $_FILES["pdf"]["error"] === UPLOAD_ERR_NO_FILE) {
  try {
    $k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
    $rows_inserted = $k_one->query("INSERT INTO images (img, description) VALUES (" . $k_one->quote(basename($_FILES["img"]["name"])) . ", " . (isset($_POST["description"]) && !empty($_POST["description"]) ? $k_one->quote($_POST["description"]) : "NULL") . ")")->rowCount();
    echo $rows_inserted === 0 ?
      "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試將圖片連結加入資料庫失敗，請立即聯絡網站設計者</span>" :
    $rows_inserted === 1 ?
      "<span style=\"color: green\"><span class=\"icon fa fa-check\"></span> 新增圖片成功</span>" :
      "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試將圖片連結加入資料庫時發生了嚴重事故（一共加了 $rows_inserted 張圖片），請立即聯絡網站設計者</span>";
    $k_one = NULL;
  } catch (PDOException $e) {
    echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試連結資料庫時遇到了以下錯誤：<br /><br /><pre><code>" . htmlspecialchars($e->getMessage()) . "</code></pre></span>";
  }
} elseif ($_FILES["pdf"]["error"] !== UPLOAD_ERR_OK)
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試上載相關 PDF 檔案時發生了以下錯誤：" . array(
    UPLOAD_ERR_INI_SIZE => "PDF 檔案大小大於系統允許上限",
    UPLOAD_ERR_FORM_SIZE => "PDF 檔案大小大於表格允許上限",
    UPLOAD_ERR_PARTIAL => "PDF 檔案上載不完整",
    UPLOAD_ERR_NO_TMP_DIR => "系統缺少一個臨時檔案夾",
    UPLOAD_ERR_CANT_WRITE => "嘗試把PDF 檔案寫進硬碟失敗",
    UPLOAD_ERR_EXTENSION => "某一個 PHP 擴展阻止了PDF 檔案上載"
  )[$_FILES["pdf"]["error"]] . "<br /><br />如果以上錯誤並不是因為檔案太大，請立即聯絡網站設計者。</span>";
elseif (!preg_match('/\.pdf$/i', $_FILES["pdf"]["name"]))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 附加 PDF 檔案名稱必須以 <code>.pdf</code> 完結（不分大小寫）</span>";
elseif (file_exists("../../pdf/uploads/" . basename($_FILES["pdf"]["name"])))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 附加 PDF 檔案名稱已存在</span>";
elseif (!move_uploaded_file($_FILES["pdf"]["tmp_name"], "../../pdf/uploads/" . basename($_FILES["pdf"]["name"])))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試將附加 PDF 檔案搬移到 <code>/pdf/uploads/</code> 失敗，請立即聯絡網站設計者</span>";
else {
  try {
    $k_one = new PDO("mysql:host=localhost;dbname=k_one", $db_username, $db_password);
    $rows_inserted = $k_one->query("INSERT INTO images (img, pdf, description) VALUES (" . $k_one->quote(basename($_FILES["img"]["name"])) . ", " . $k_one->quote(basename($_FILES["pdf"]["name"])) . ", " . (isset($_POST["description"]) && !empty($_POST["description"]) ? $k_one->quote($_POST["description"]) : "NULL") . ")")->rowCount();
    echo $rows_inserted === 0 ?
      "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試將圖片和附加 PDF 檔案連結加入資料庫失敗，請立即聯絡網站設計者</span>" :
    $rows_inserted === 1 ?
      "<span style=\"color: green\"><span class=\"icon fa fa-check\"></span> 新增圖片成功</span>" :
      "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試將圖片和附加 PDF 檔案連結加入資料庫時發生了嚴重事故（一共加了 $rows_inserted 張圖片），請立即聯絡網站設計者</span>";
    $k_one = NULL;
  } catch (PDOException $e) {
    echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 新增圖片失敗 - 嘗試連結資料庫時遇到了以下錯誤：<br /><br /><pre><code>" . htmlspecialchars($e->getMessage()) . "</code></pre></span>";
  }
}

?>
