@extends('layouts.master')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet"/>

    <div class='home-section'>
        <div class='container'>
            <div class='row home-row'>
                <div class='col'>
                    <div class='home-text-wrapper'>
                        <h1 class='heading'>GudangKu</h1>
                        <div class='top-line'>Pertama di Indonesia</div>
                        <p class='home-subtitle'>
                            Pencatatan keluar masuk gudang menjadi lebih aman dan mudah, tanpa ribet dan tapi-tapian
                        </p>
                        <a href="/service" class="btn--primary">Learn More</a>
                    </div>
                </div>
                <div class='col'>
                    <div class='home-img-wrapper'>
                        <img src="{{ asset('img/undraw_logistics_x4dc.svg') }}" alt="ilustrasi gudang" class='home-img' />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
