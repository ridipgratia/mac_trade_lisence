@extends('layouts.app')
@section('title', 'Trade Lisence')
@section('css_link')
    <link rel="stylesheet" href="{{ URL::asset('css/trade/trade.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center text-center">
        <div style="">
            <span class="fw-bold text-danger">
                <h2>Mising Ka:sí:suné Milung
                    Trade License</h2>
            </span>

            <h4>Information Related To Trade License</h4>
            <div class="d-flex flex-wrap gap-2 justify-content-center col-12">
                {{-- ------about start-------- --}}
                <div class="col-md-5 col-11">
                    <span class="text-secondary fw-bold text-uppercase">
                        <h3>About</h3>
                    </span>
                    <p class="shadow"
                        style="padding:10px;border-radius:5px; text-align: justify; min-height: 250px;height: auto;align-content: center">
                        The Trade License System provides a digital interface, allowing citizens to apply for the Trade
                        License and
                        subsequently make the payment online. Traders can apply for new licenses, renewals, amendments, and
                        supplemental
                        licenses. It streamlines and automates business licensing processes and helps a business to be set
                        up
                        quickly.
                    </p>
                </div>
                {{-- -------about -end ------------- --}}
                {{-- -----facility start------ --}}
                <div class="col-md-5 col-11">
                    <span class="text-secondary fw-bold text-uppercase">
                        <h3>FACILITIES</h3>
                    </span>
                    <div class="d-flex flex-wrap flex-column  col-12 shadow"
                        style="padding: 10px;align-items: center; min-height: 250px;height: auto;align-content: center;justify-content: center;">
                        <li class="list-group col-md-6 col-10" style="margin: 5px 0px; text-align: left;">1. Apply for new
                            Trade License</li>
                        <li class="list-group col-md-6 col-10" style="margin: 5px 0px; text-align: left;">2. Apply for
                            renewal of
                            Trade License</li>
                        <li class="list-group col-md-6 col-10" style="margin: 5px 0px; text-align: left;">3. Download Trade
                            License.
                        </li>
                        <li class="list-group col-md-6 col-10" style="margin: 5px 0px; text-align: left;">4. Make Online
                            payments</li>
                        <li class="list-group col-md-6 col-10" style="margin: 5px 0px; text-align: left;">5. Track
                            application Status
                        </li>
                    </div>
                </div>
                {{-- -----facility end------- --}}
            </div>
        </div>
    </div>
    <x-trade.main-trade-links-component></x-trade.main-trade-links-component>
@endsection
