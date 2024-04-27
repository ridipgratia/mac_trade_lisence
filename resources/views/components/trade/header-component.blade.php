<style>
    .row {
        display: flex;
        justify-content: space-between;
    }

    .col {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header-img {
        padding: 10px 50px;
    }

    .header-img img {
        height: 60px;
    }

    .px-3 {
        padding: 12px;
    }

    .header-email {
        padding: 10px 60px;
    }

    .text-primary {
        color: rgb(0, 115, 255);
    }

    .text-dark {
        color: rgb(101, 100, 100);
    }

    .icon {
        border: 1 px solid red;
        background-color: rgba(0, 217, 255, 0.089);
        padding: 6px 10px;
        border-radius: 50%;
    }
</style>


{{-- font awesome cdn link --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


{{-- call component --}}
{{-- <x-trade.header-component></x-trade.header-component> --}}



<div class="">
    <div class="row">
        <div class="col header-img">
            <img src="/img/gmc.svg" alt="img">
        </div>
        <div class="col header-email ">
            <div class="icon text-primary">
                <i class="fa-regular fa-envelope"></i>
            </div>
            <p class="px-3 text-dark">example@gmail.com</p>
        </div>
    </div>
</div>
