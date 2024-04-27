@extends('layouts.app')
@section('title', 'Trade Lisence')
@section('css_link')
    <link rel="stylesheet" href="{{ asset('css/trade/trade.css') }}">
@endsection
@section('content')
    <div class="p-2 shadow">
        <p>Trade license details</p>
        <form action="">
            <div>
                <label for="name">Name</label>
                <input type="text" name="" placeholder="Enter your name">
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="" placeholder="Enter your name">
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="" placeholder="Enter your name">
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="" placeholder="Enter your name">
            </div>
        </form>
    </div>
@endsection
