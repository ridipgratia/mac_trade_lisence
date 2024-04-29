<div class="d-flex flex-wrap add-trade-form col-12">
    <div class="d-flex flex-wrap add-trade-form-head col-12">
        <span><i class="fa-solid fa-circle-info"></i></span>
        <span>Trade Details</span>
    </div>
    <div class="d-flex flex-wrap add-trade-form-body  col-12">
        <div class="d-flex flex-wrap col-11 col-md-3 add-trade-form-body-1 ">
            <p class="col-12">License Type</p>
            <select class="col-12 trade-input-name" name="license_type">
                <option value="1" selected disabled>Select</option>
                <option value="2">General Trade License</option>
                <option value="3">Health Trade License</option>
                <option value="4">Veterinary License</option>
                <option value="5">Slow Moving Vehicle</option>
            </select>
            <p class="trade_error"></p>
        </div>
        <div class="d-flex flex-wrap col-11 col-md-3 add-trade-form-body-1">
            <p class="col-12">Nature of Trade</p>
            <input type="text" name="nature_of_trade" class="col-12 trade-input-name">
            <p class="trade_error"></p>
        </div>
        <div class="d-flex flex-wrap col-11 col-md-3 add-trade-form-body-1">
            <p class="col-12">Annual Income From Trade (in Rs.)</p>
            <select class="col-12 trade-input-name" name="anual_income">
                <option value="1" selected disabled>Select</option>
                <option value="2">Below 5 Lakh</option>
                <option value="3">5 Lakh to 10 Lakh</option>
                <option value="4">10 Lakh to 20 Lakh</option>
                <option value="5">20 Lakh and Above</option>
            </select>
            <p class="trade_error"></p>
        </div>
    </div>
</div>
