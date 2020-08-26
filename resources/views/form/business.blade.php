
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
        <label>Company Name</label>
        <input type="text" class="form-control" name="company" required>
        <div class="form-alert">(Please include your name if you do not represent a company.)</div>
    </div>


    <div class="form-group required">
        <label>What is your job title/position in the company?</label>
        <input type="text" class="form-control" name="position" required>
    </div>

    <div class="form-group required">
        <label>Reason for contacting us.</label><br>
        <template v-for="option,index in ['Purchase','Regional Sales Representitive','Exclusive Distributorship','Other']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="radio" :id="'size' + index" :value="option" name="companysize">
                <label class="form-check-label" :for="'size' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label>Country</label>
        <input type="text" class="form-control" name="country" required>
    </div>

    <div class="form-group">
        <label>The city you want to start HADO?</label>
        <input type="text" class="form-control" name="city" required>
    </div>

    <div class="form-group required">
        <label>Product(Multiple choices may be selected.) </label><br>
        <template v-for="option,index in
                    ['HADO',
                    'HADO MONSTER BATTLE',
                    'HADO SHOOT',
                    'HADO KART'
                    ]">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="checkbox" :id="'hadotype' + index" :value="option"  name="hadotype">
                <label class="form-check-label" :for="'hadotype' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label>Do you have an existing facility? </label><br>
        <template v-for="option,index in
                    ['Sports Center',
                    'Amusement Park',
                    'Entertainment Center',
                    'Other',
                    'No, I currently don\'t have any facility.']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="radio" :id="'hadotype' + index" :value="option"  name="hadotype">
                <label class="form-check-label" :for="'hadotype' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label>How did you hear about HADO? (Multiple choices may be selected.) </label><br>
        <template v-for="option,index in
                    ['Facebook','Twitter','Website','Acquaintance','Event or Expo','TV','Magazine','Newspaper','Other']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="checkbox" :id="'hadotype' + index" :value="option"  name="hadotype">
                <label class="form-check-label" :for="'hadotype' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group">
        <label>Please provide specific information about your interest in HADO below.</label>
        <input type="text" class="form-control" name="city" required>
    </div>

    <div>
        <button class="btn btn-submit" type="submit">SUBMIT<i class="fas fa-chevron-right"></i></button>
    </div>

</form>
