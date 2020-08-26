
<form id="contact-form" class="contact-form" @submit.prevent="FormSubmit('{{route("FormSubmit")}}')">

    <div class="form-group required">
        <label>お名前</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group required">
        <label>メールアドレス</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group required">
        <label>会社名</label>
        <input type="text" class="form-control" name="company" required>
    </div>
    <div class="form-group required">
        <label>電話番号</label>
        <input type="text" class="form-control" name="tel" required>
    </div>
    <div class="form-group required">
        <label>お問い合わせ内容</label>
        <textarea class="form-control" name="message" required></textarea>
    </div>


    <h4>＜お問い合わせへのご回答について＞</h4>
    <ul>
        <li>営業担当、または担当代理店(スタンバイ株式会社)よりメールまたはお電話にて回答させていただきます。</li>
        <li>土日、祝日前後、年末年始ほか、弊社休業日に頂いたご連絡については、翌営業日以降の回答となりますのでご了承下さい。</li>
    </ul>

    <div>
        <button class="btn btn-submit" type="submit">送信內容確認 <i class="fas fa-chevron-right"></i></button>
    </div>

</form>
