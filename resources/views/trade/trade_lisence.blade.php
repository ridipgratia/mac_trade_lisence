@extends('layouts.app')
@section('title', 'Trade Lisence')
@section('css_link')
    <link rel="stylesheet" href="{{ asset('css/trade/trade.css') }}">
@endsection
@section('content')
    <div class="" style="height: calc(340px);"">

    </div>
    <div class="d-flex flex-wrap main-trade-links-div">
        <a href="/trade/add-trade"><i class="fa-solid fa-plus"></i> Apply For New Trade License</a>
    </div>
@endsection
