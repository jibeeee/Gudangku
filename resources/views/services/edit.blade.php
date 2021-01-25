@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/checkIn.css') }}" rel="stylesheet"/>

    <!-- SideNav -->
    <div class="sidenav">
        <a href="{{route('service.index')}}"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="{{route('service.inventory')}}"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="{{route('supplier.index')}}"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="{{route('service.create')}}"><i class="fas fa-sign-in-alt me-2 rotate"></i></i>Create Item</a>
    </div>

    <div class="main">
        <div class="card shadow">
            <div class="card-body">
                <h1>Item Check In</h1>
                <form action="{{route('service.update', $barangId)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col left">
                            <div class='home-img-wrapper'>
                                <img src="{{asset('img/box.svg')}}" alt="ilustrasi kotak" class='home-img' />
                            </div>
                        </div>
                        <div class="col right">
                            <label for="nama_barang" class="form-label">Item's Name</label>
                            <input type="text" value="{{$query->namaBarang}}" class="form-control" id="namaBarang" name="namaBarang">

                            <label for="nama_barang" class="form-label">Quantity</label>
                            <input type="number" value="{{$query->quantity}}" class="form-control" id="quantity" name="quantity" min="0">
                        </div>
                    </div>

                    <div class="col submit">
                        <button class="btn btn-large" type="submit">SUBMIT EDIT</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
