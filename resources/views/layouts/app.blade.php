<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/trade/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trade/media.css') }}">
    @yield('css_link')
    <style>
        #drop-area {
        width: 300px;
        height: 200px;
        border: 2px dashed #ccc;
        border-radius: 20px;
        text-align: center;
        line-height: 200px;
        font-size: 20px;
        margin: 0 auto;
        margin-top: 50px;
    }

    </style>
</head>

<body>
    <div class="container-xxl p-0 main-app-layout-content">
        {{-- ------------------- header component initialize ----------------- --}}
        <x-trade.header-component></x-trade.header-component>
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).on('drop','.drop-area', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#drop-area').removeClass('hover');

            var files = e.originalEvent.dataTransfer.files;

            if (files.length > 0) {
                handleFiles(files);
            }
        });
        function handleFiles(files) {
            var file = files[0];
            $('#file-input').val(file.name);
        }
    </script>
</body>

</html>
