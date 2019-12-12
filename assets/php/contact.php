<section id="contact">
  <div class="inner">
    <section>
      <header class="major">
        <h2>聯絡我們</h2>
      </header>
      <form method="post" action="#">
        <div class="fields">
          <div class="field half">
            <label for="name">姓名</label>
            <input type="text" name="name" id="name" disabled />
          </div>
          <div class="field half">
            <label for="email">電郵地址</label>
            <input type="email" name="email" id="email" disabled />
          </div>
          <div class="field">
            <label for="message">信息內容</label>
            <textarea name="message" id="message" rows="6" disabled></textarea>
          </div>
        </div>
        <ul class="actions" id="actions" style="display: none">
          <li><input type="submit" value="傳送" class="primary" id="submit" /></li>
          <li><input type="reset" value="重置表格" id="reset" /></li>
        </ul>
        <noscript>
          <ul class="actions">
            <li><span class="button disabled primary">傳送</span></li>
            <li><span class="button disabled">重置表格</span></li>
          </ul>
        </noscript>
      </form>
      <p id="status">
        <!-- 提交聯絡表格狀態 -->
        <noscript>
          <span style="color: red"><span class="icon fa fa-exclamation-circle"></span> 您必須啟用瀏覽器的 JavaScript 方能使用此聯絡表格。</span>
        </noscript>
      </p>
    </section>
    <section class="split">
      <section>
        <div class="contact-method">
          <span class="icon alt fa-envelope"></span>
          <h3>電郵地址</h3>
          <a href="mailto:kent@koneholiday.com">kent@koneholiday.com</a>
        </div>
      </section>
      <section>
        <div class="contact-method">
          <span class="icon alt fa-phone"></span>
          <h3>電話號碼</h3>
          <h5>香港</h5>
          <p>(852) 2110 4441<br />(852) 2110 4443</p>
          <h5>中國</h5>
          <p>(86) 898 6675 5814<br />(86) 147 1602 2146</p>
          <h5>日本</h5>
          <p>(81) 70 1300 0888</p>
        </div>
      </section>
      <section>
        <div class="contact-method">
          <span class="icon alt fa-fax"></span>
          <h3>傳真號碼</h3>
          <h5>香港</h5>
          <p>(852) 2110 4485</p>
          <h5>中國</h5>
          <p>(86) 898 6675 5054</p>
        </div>
      </section>
      <section>
        <div class="contact-method">
          <span class="icon alt fa-home"></span>
          <h3>地址</h3>
          <h5>香港總店</h5>
          <p>九龍尖沙咀麼地道63號<br />好時商業中心2樓261鋪</p>
          <p id="hk-map">
            <!-- 香港總店谷歌地圖 -->
          </p>
        </div>
      </section>
    </section>
  </div>
</section>
<script src="assets/js/contact.js"></script>
