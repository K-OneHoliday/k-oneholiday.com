/*
 * adminLoginAuthentication.js
 * 處理管理員登入的腳本
 * (c) 2018 健一假期。版權所有。
 */

// 啟用嚴格模式
"use strict";

// 保存 window.onload 默認行動
var _windowOnload = window.onload;

// 改裝 window.onload
window.onload = function () {
  // 執行 window.onload 默認行動（如有）
  if (typeof _windowOnload === "function")
    _windowOnload();
  // 改裝管理員登入系統使用 AJAX
  document.getElementById("login").onclick = function (event) {
    event.preventDefault();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        document.getElementById("status").innerHTML = this.responseText;
        if (document.getElementById("status").getElementsByTagName("script").length === 1)
          eval(document.getElementById("status").getElementsByTagName("script")[0].innerHTML);
        window.setTimeout(function () {
          document.getElementById("status").innerHTML = "";
        }, 5000);
      }
    };
    xhttp.open("POST", "../assets/php/admin_login_authentication.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + encodeURIComponent(document.getElementById("username").value) + "&password=" + encodeURIComponent(document.getElementById("password").value));
  };
};
