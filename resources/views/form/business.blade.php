

    <div class="form-group required">
        <label data-label="name">Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group required">
        <label data-label="email">Email Address</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group required">
        <label data-label="company">Company Name</label>
        <input type="text" class="form-control" name="company" required>
        <div class="form-alert">(Please include your name if you do not represent a company.)</div>
    </div>

    <div class="form-group required">
        <label data-label="link">Please provide a link to your corporate site.</label>
        <input type="text" class="form-control" name="link" required>
        <div class="form-alert">(Please leave "blank" if you don’t have any website.)</div>
    </div>

    <div class="form-group required">
        <label data-label="companysize">What is the size of your company?</label><br>
        <template v-for="option,index in ['I don\'t have a company.','1 ~ 10','11 ~ 30','31 ~ 50','51 ~ 100','101 ~ 200','201 ~ 500','500 ~']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="radio" :id="'size' + index" :value="option" name="companysize">
                <label class="form-check-label" :for="'size' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>


    <div class="form-group required">
        <label data-label="position">What is your job title/position in the company?</label>
        <input type="text" class="form-control" name="position" required>
    </div>

    <div class="form-group required">
        <label data-label="reason">Reason for contacting us.</label><br>
        <template v-for="option,index in ['Purchase','Regional Sales Representitive','Exclusive Distributorship','Other']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="radio" :id="'size' + index" :value="option" name="reason">
                <label class="form-check-label" :for="'size' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>



    <div class="form-group required">
        <label  data-label="country">Country</label>
        <input type="text" class="form-control" name="country" required>
    </div>

    <div class="form-group">
        <label data-label="city">The city you want to start HADO?</label>
        <input type="text" class="form-control" name="city" required>
    </div>

    <div class="form-group required">
        <label data-label="products">Product(Multiple choices may be selected.) </label><br>
        <template v-for="option,index in
                    ['HADO',
                    'HADO MONSTER BATTLE',
                    'HADO SHOOT',
                    'HADO KART'
                    ]">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="checkbox" :id="'products' + index" :value="option"  name="products">
                <label class="form-check-label" :for="'products' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label data-lable="facility">Do you have an existing facility? </label><br>
        <template v-for="option,index in
                    ['Sports Center',
                    'Amusement Park',
                    'Entertainment Center',
                    'Other',
                    'No, I currently don\'t have any facility.']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="radio" :id="'facility' + index" :value="option"  name="facility">
                <label class="form-check-label" :for="'facility' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label data-label="where">How did you hear about HADO? (Multiple choices may be selected.) </label><br>
        <template v-for="option,index in
                    ['Facebook','Twitter','Website','Acquaintance','Event or Expo','TV','Magazine','Newspaper','Other']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="checkbox" :id="'where' + index" :value="option"  name="where">
                <label class="form-check-label" :for="'where' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group">
        <label data-label="information">Please provide specific information about your interest in HADO below.</label>
        <input type="text" class="form-control" name="information" required>
    </div>

    <div>
        <button class="btn btn-submit" type="submit">SUBMIT<i class="fas fa-chevron-right"></i></button>
    </div>

