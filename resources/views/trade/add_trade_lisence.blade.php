@extends('layouts.app')
@section('title', 'Add Trade Lisence')
@section('css_link')
    <link rel="stylesheet" href="{{ asset('css/trade/add_trade_lisence.css') }}">
@endsection
@section('content')
    <div class="d-flex flex-wrap main-add-trade-form col-12">
        <div class="col-11 add-trade-back-div">
            <a href="/"><span><i class="fa-solid fa-house"></i></span> Home</a>
        </div>
        <form action="" id="add-trade-form" class="d-flex flex-wrap col-11">
            @csrf
            {{-- ------------------- trade owner persoanl details -------------------- --}}
            <x-trade.trade-owner-details-conponent></x-trade.trade-owner-details-conponent>
            {{-- --------------- trade  location details -------------------- --}}
            <x-trade.trade-location-details-component></x-trade.trade-location-details-component>
            {{-- ------------------ trade details -------------- --}}
            <x-trade.trade-details-component></x-trade.trade-details-component>
            {{-- ---------------- trade contact details ---------------- --}}
            <x-trade.trade-contact-component></x-trade.trade-contact-component>
            {{-- ------------------- trade identify --------------- --}}
            <x-trade.trade-identify-component></x-trade.trade-identify-component>
            {{-- ------------------- upload document --------------- --}}
            <x-trade.trade-document-component></x-trade.trade-document-component>
            {{-- ------------------------------ trade declaration------------------------- --}}
            <x-trade.trade-declaration-component></x-trade.trade-declaration-component>

        </form>
    </div>
@endsection
@section('js_link')
    <script type="module" src="{{ asset('js/trade/trade.js') }}"></script>
@endsection
