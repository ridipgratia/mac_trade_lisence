<div class="d-flex flex-wrap add-trade-form col-12">
    <div class="d-flex flex-wrap add-trade-form-head col-12">
        <span><i class="fa-solid fa-address-book"></i></span>
        <span>Contact Details</span>
    </div>
    <div class="d-flex flex-wrap flex-column add-trade-form-body col-12">
        <div class="d-flex flex-wrap col-11 col-md-6 add-trade-form-body-1">
            <p class="col-12">Mobile Number</p>
            <span>Please provide a valid 10 digit mobile number, as it will be used for all further
                communication.</span>
            <div class="d-flex flex-wrap col-12 add-trade-contact">
                <div class="d-flex flex-wrap col-md-8 col-12">
                    <input type="number" name="mobile_number" class="col-12 trade-input-name" id="trade-content-phone"
                        placeholder="mobile number">
                    <p class="trade_error trade-contact-error"></p>
                </div>
                <button type="button" class="add-trade-contact-btn" id="send_trade_otp">Send OTP</button>
            </div>
        </div>
        <div class="d-flex flex-wrap col-11 col-md-6 add-trade-form-body-1 trade-otp-div">
            <p class="col-12">Enter Your OTP</p>
            <div class="d-flex flex-wrap col-12 add-trade-contact">
                <div class="d-flex flex-wrap col-md-8 col-12">
                    <input type="number" name="mobile_number" class="col-12" id="trade-contact-otp"
                        placeholder="Enter OTP">
                    <p class="trade-contact-error"></p>
                </div>
                <button type="button" class="add-trade-contact-btn" id="send_trade_otp_verify">Verify OTP</button>
            </div>
        </div>
    </div>
</div>
