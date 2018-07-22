/*
 * admin_about_images.js
 * 負責處理 about_images.php 主要 AJAX 環節的腳本
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
  getCurrentItems();
};

function getCurrentItems() {
  var
    content = "<tr><td><input type=\"file\" id=\"img\" name=\"img\" /></td><td><input type=\"file\" id=\"pdf\" name=\"pdf\" /></td><td><textarea id=\"description\" name=\"description\" style=\"resize: none\"></textarea></td><td><a class=\"button special\" href=\"#\" onclick=\"event.preventDefault();addImage()\"><span class=\"icon fa fa-plus\"></span> 新增</a></td></tr>",
    xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      content += this.responseText;
      document.getElementById("current-items").innerHTML = content;
    }
  };
  xhttp.open("GET", "../assets/php/admin_about_images_current_items.php", true);
  xhttp.send();
}

// 定義刪除圖案行動
function deleteImageWithId(id) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById("status").innerHTML = this.responseText;
      window.setTimeout(function () {
        document.getElementById("status").innerHTML = "";
      }, 5000);
      getCurrentItems();
    }
  };
  req.open("POST", "../assets/php/admin_delete_about_image.php", true);
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.send("id=" + encodeURIComponent(id));
}
