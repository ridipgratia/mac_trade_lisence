@extends('layouts.app')
@section('title', 'Trade Lisence')
@section('css_link')
    <link rel="stylesheet" href="{{ asset('css/trade/trade.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center text-center">
        <div style="">
            <span class="fw-bold text-danger">
                <h2>Mising Ka:sí:suné Milung
                    Trade License</h2>
            </span>

            <h4>Information Related To Trade License</h4>
            <span class="text-secondary fw-bold text-uppercase">
                <h3>About</h3>
            </span>
            <p class="shadow" style="padding:10px;border-radius:5px;">
                The Trade License System provides a digital interface, allowing citizens to apply for the Trade License and
                subsequently make the payment online. Traders can apply for new licenses, renewals, amendments, and
                supplemental
                licenses. It streamlines and automates business licensing processes and helps a business to be set up
                quickly.
            </p>
            <span class="text-secondary fw-bold text-uppercase">
                <h3>FACILITIES</h3>
            </span>
            <div class="shadow">
                <li class="list-group">Apply for new Trade License</li>
                <li class="list-group">Apply for renewal of Trade License</li>
                <li class="list-group">Download Trade License.</li>
                <li class="list-group">Make Online payments</li>
                <li class="list-group">Track application Status</li>
            </div>
        </div>
    </div>
    <x-trade.main-trade-links-component></x-trade.main-trade-links-component>
@endsection
