<?php

/*
 * logout.php
 * 處理將管理員登出的腳本
 * (c) 2018 健一假期。版權所有。
 */

session_start();
session_destroy();
header("Location: login.php");

?>
