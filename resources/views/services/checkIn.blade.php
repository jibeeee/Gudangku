@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/checkIn.css') }}" rel="stylesheet"/>

    <!-- SideNav -->
    <div class="sidenav">
        <a href="{{route('service.index')}}"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="{{route('service.inventory')}}"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="{{route('supplier.index')}}"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="{{route('service.create')}}" id="sidenav-active"><i class="fas fa-sign-in-alt me-2 rotate"></i></i>Create Item</a>
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
                            <!-- Nama Barang -->
                            <label for="nama_barang" class="form-label">Item's Name</label>
                            <input type="text" value="{{Request::old('namaBarang')}}" class="form-control" id="namaBarang" name="namaBarang" required>

                            <!-- Jumlah Barang -->
                            <label for="nama_barang" class="form-label">Quantity</label>
                            <input type="number" value="{{Request::old('quantity')}}" class="form-control" id="quantity" name="quantity" min="0" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <!-- Panjang -->
                            <label for="panjang_barang" class="form-label">Length</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="length" name="length" min="1" required>
                                <span class="input-group-text" id="basic-addon2" value="{{Request::old('length')}}">cm</span>
                            </div>
                        </div>
                        <div class="col">

                            <!-- Lebar -->
                            <label for="lebar_barang" class="form-label">Width</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="width" name="width" min="1" required>
                                <span class="input-group-text" id="basic-addon2" value="{{Request::old('width')}}">cm</span>
                            </div>
                        </div>
                        <div class="col">

                            <!-- Tinggi -->
                            <label for="tinggi_barang" class="form-label">Heigth</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="heigth" name="height" min="1" required>
                                <span class="input-group-text" id="basic-addon2" value="{{Request::old('heigth')}}">cm</span>
                            </div>
                        </div>
                    </div>

                    <!-- Supplier -->
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
