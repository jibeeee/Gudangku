@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/checkIn.css') }}" rel="stylesheet"/>
    
    <!-- SideNav -->
    <div class="sidenav">
        <a href="{{route('service.index')}}"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="{{route('service.inventory')}}"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="{{route('supplier.index')}}"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="{{route('service.create')}}"><i class="fas fa-sign-in-alt me-2 rotate"></i></i>Check In</a>
        <a href="#"><i class="fas fa-sign-out-alt me-2 rotate-2"></i>Check Out</a>
    </div>

    <div class="main">
        <div class="card shadow">
            <div class="card-body">
                <h1>Item Check In</h1>
                <form action="{{route('service.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col left">
                            <div class='home-img-wrapper'>
                                <img src="{{asset('img/box.svg')}}" alt="ilustrasi kotak" class='home-img' />
                            </div>
                        </div>
                        <div class="col right">
                            <label for="nama_barang" class="form-label">Item's Name</label>
                            <input type="text" class="form-control" id="namaBarang" name="namaBarang">
        
                            <label for="nama_barang" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="panjang_barang" class="form-label">Length</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="length" min="1">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="lebar_barang" class="form-label">Width</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="width" min="1">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="tinggi_barang" class="form-label">Heigth</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="heigth" min="1">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>

                    <label for="supplier" class="form-label">Supplier</label>
                        <select id="supplier" name="supplier">
                            @foreach ($daftarSupplier as $item)
                                <option value="{{$item->id}}">{{$item->namaSupplier}}</option>
                            @endforeach
                        </select>

                    <div class="col submit">
                        <button class="btn btn-large" type="submit">SUBMIT</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
