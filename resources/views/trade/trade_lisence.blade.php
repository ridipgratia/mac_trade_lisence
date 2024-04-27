@extends('layouts.app')
@section('title', 'Trade Lisence')
@section('css_link')
    <link rel="stylesheet" href="{{ asset('css/trade/trade.css') }}">
@endsection
@section('content')
    <div class="d-flex flex-wrap main-trade-links-div">
        <a href=""><i class="fa-solid fa-plus"></i> Apply For New Trade License</a>
    </div>
@endsection
