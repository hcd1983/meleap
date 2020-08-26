
<form id="contact-form" class="contact-form" @submit.prevent="FormSubmit('{{route("FormSubmit")}}')">

    <div class="form-group required">
        <label>Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group required">
        <label>Email Address</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group required">
        <label>Content of inquiry</label>
        <textarea class="form-control" name="message" required></textarea>
    </div>


    <div>
        <button class="btn btn-submit" type="submit">SUBMIT<i class="fas fa-chevron-right"></i></button>
    </div>

</form>
