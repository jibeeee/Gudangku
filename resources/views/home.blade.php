@extends('layouts.master')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet"/>
    <div class='home-section'>
        <div class='container'>
            <!-- Section 1 -->
            <div class='row home-row'>
                <div class='col'>
                    <div class='home-text-wrapper'>
                        <h1 class='heading'>GudangKu</h1>
                        <div class='top-line'>Pertama di ITTelkom Surabaya</div>
                        <p class='home-subtitle'>
                            Pencatatan barang di gudang menjadi lebih aman dan mudah, tanpa ribet tanpa bingung.
                        </p>
                        <a href="/service" class="btn--primary">Geting Started</a>
                    </div>
                </div>
                <div class='col'>
                    <div class='home-img-wrapper'>
                        <img src="{{ asset('img/home_section1.svg') }}" alt="ilustrasi gudang" class='home-img' />
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class='row home-row'>
                <div class='col'>
                    <div class='home-img-wrapper'>
                        <img src="{{ asset('img/home_section2.svg') }}" alt="ilustrasi gudang" class='home-img' />
                    </div>
                </div>
                <div class='col' >
                    <div class='home-text-wrapper mt-5'>
                        <div class='top-line'>Latar Belakang</div>
                        <p class='home-subtitle'>
                            Hampir 50% dari pemilik Online Shop tidak mempunyai ruang yang cukup untuk menyimpan barang.<br><br>
                            Kami membantu pemilik Online Shop untuk menyimpan barang jualannya secara praktis dan aman.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
