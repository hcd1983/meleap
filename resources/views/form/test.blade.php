
<form id="contact-form" class="contact-form" @submit.prevent="FormSubmit('{{route("FormSubmit")}}',{aa:'bb'})" ref="contactForm">

    <div class="form-group required">
        <label>お名前</label>
        <input type="text" class="form-control" name="name" required>
    </div>


    <div>
        <button class="btn btn-submit" type="submit">送信內容確認 <i class="fas fa-chevron-right"></i></button>
    </div>

</form>
