/*
 * contact.js
 * 一個處理聯絡表格提交行動以及其他瑣碎事項的腳本
 * (c) 2018 健一假期。版權所有。
 */

window.onload = function () {
  // 啟動嚴格模式
  "use strict";

  // 使用 AJAX 加載谷歌地圖
  // 這能防止谷歌地圖減慢網站加載的速度
  var hkMapReq = new XMLHttpRequest(), hainanMapReq = new XMLHttpRequest();
  hkMapReq.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200)
      document.getElementById("hk-map").innerHTML = this.responseText;
  };
  hainanMapReq.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200)
      document.getElementById("hainan-map").innerHTML = this.responseText;
  };
  hkMapReq.open("GET", "assets/php/hk_map.php", true);
  hkMapReq.send();
  hainanMapReq.open("GET", "assets/php/hainan_map.php", true);
  hainanMapReq.send();

  // 啟用聯絡表格
  document.getElementById("name").disabled
    = document.getElementById("email").disabled
    = document.getElementById("message").disabled
    = false;
  document.getElementById("actions").style.display = "flex";

  // 使用 AJAX 傳送表格資料
  document.getElementById("submit").onclick = function (event) {
    event.preventDefault();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        document.getElementById("status").innerHTML = this.responseText;
        window.setTimeout(function () {
          document.getElementById("status").innerHTML = "";
        }, 5000);
      }
    };
    xhttp.open("POST", "assets/php/submit.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
      "name=" + encodeURIComponent(document.getElementById("name").value) + "&" +
      "email=" + encodeURIComponent(document.getElementById("email").value) + "&" +
      "message=" + encodeURIComponent(document.getElementById("message").value)
    );
  };

  // 防止訪客不小心重置聯絡表格
  document.getElementById("reset").onclick = function (event) {
    if (!confirm("您確定要重置表格嗎？"))
      event.preventDefault();
  };
};
