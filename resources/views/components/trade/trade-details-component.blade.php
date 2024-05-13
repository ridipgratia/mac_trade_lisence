<div class="d-flex flex-wrap add-trade-form col-12">
    <div class="d-flex flex-wrap add-trade-form-head col-12">
        <span><i class="fa-solid fa-circle-info"></i></span>
        <span>Trade Details</span>
    </div>
    <div class="d-flex flex-wrap add-trade-form-body  col-12">
        <div class="d-flex flex-wrap col-11 col-md-3 add-trade-form-body-1 ">
            <p class="col-12">License Type</p>
            <select class="col-12 trade-input-name" name="license_type">
                <option selected disabled>Select</option>
                @foreach ($tradeDetailsExtra['license_type'] as $license_type)
                    <option value="{{ $license_type->id }}">{{ $license_type->license_type }}</option>
                @endforeach
            </select>
            <p class="trade_error"></p>
        </div>
        <div class="d-flex flex-wrap col-11 col-md-3 add-trade-form-body-1">
            <p class="col-12">Nature of Trade</p>
            <input type="text" name="nature_of_trade" class="col-12 trade-input-name" placeholder="nature of trade">
            <p class="trade_error"></p>
        </div>
        <div class="d-flex flex-wrap col-11 col-md-3 add-trade-form-body-1">
            <p class="col-12">Annual Income From Trade (in Rs.)</p>
            <select class="col-12 trade-input-name" name="anual_income">
                <option selected disabled>Select</option>
                @foreach ($tradeDetailsExtra['annual_income'] as $annual_income)
                    <option value="{{ $annual_income->id }}">{{ $annual_income->anual_income }}</option>
                @endforeach
            </select>
            <p class="trade_error"></p>
        </div>
    </div>
</div>
