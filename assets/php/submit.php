<?php

/*
 * submit.php
 * 負責處理聯絡表格提交行動的腳本
 * (c) 2018 健一假期。版權所有。
 */

use PHPMailer\PHPMailer\PHPMailer;

require "../libs/PHPMailer-6.0.5/src/PHPMailer.php";
require "locale.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["message"]))
  echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 傳送信息失敗 - 請提交正確的表格</span>";
else {
  $name_empty = empty($_POST["name"]);
  $email_empty = empty($_POST["email"]);
  $email_invalid = !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
  $message_empty = empty($_POST["message"]);
  if ($name_empty || $email_empty || $email_invalid || $message_empty) {
    echo "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 傳送信息失敗 - 表格資料出現了以下問題：<br /><br /><ul>";
    if ($name_empty)
      echo "<li>「姓名」欄位不可留空</li>";
    if ($email_empty)
      echo "<li>「電郵地址」欄位不可留空</li>";
    elseif ($email_invalid)
      echo "<li>您所提供的電郵地址不正確</li>";
    if ($message_empty)
      echo "<li>「信息內容」欄位不可留空</li>";
    echo "</ul></span>";
  } else {
    $mail = new PHPMailer;
    $mail->setFrom($_POST["email"], $_POST["name"]);
    $mail->addReplyTo($_POST["email"], $_POST["name"]);
    $mail->addAddress("kent@koneholiday.com");
    // $mail->addBCC("i.donaldl@me.com"); // For debugging purposes only
    $mail->Subject = "[健一假期網頁]來自{$_POST["name"]}的信息";
    $mail->Body = $_POST["message"];
    echo $mail->send() ?
      "<span style=\"color: green\"><span class=\"icon fa fa-check-circle\"></span> 傳送信息成功。</span>" :
      "<span style=\"color: red\"><span class=\"icon fa fa-exclamation-circle\"></span> 傳送信息失敗 - 網站嘗試傳送信息時遇到了不知名的錯誤，請直接電郵給 <a href=\"mailto:kent@koneholiday.com\">kent@koneholiday.com</a> 並向本公司回報此錯誤。</span>";
  }
}

?>
