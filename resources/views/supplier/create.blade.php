@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/supplier.css') }}" rel="stylesheet"/>

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
                <h1>Create Supplier</h1>
                <form action="{{route('supplier.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col left">
                            <div class='home-img-wrapper'>
                                <img src="{{asset('img/delivery-truck.svg')}}" alt="ilustrasi truk" class='home-img' />
                            </div>
                        </div>
                        <div class="col right">
                            <label for="nama_barang" class="form-label">Supplier's Name</label>
                            <input type="text" class="form-control" id="namaSupplier" name="namaSupplier" required autofocus>

                            <label for="nama_barang" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact" name="contact">

                            <label for="nama_barang" class="form-label">Address</label>
                            <input type="text" class="form-control" id="Address" name="Address">
                        </div>
                    </div>

                    <div class="col submit">
                        <button class="btn btn-large" type="submit">SUBMIT</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
