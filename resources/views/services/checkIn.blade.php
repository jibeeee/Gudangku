@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>
    
    <!-- SideNav -->
    <div class="sidenav">
        <a href="#"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="#"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="#"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="#"><i class="fas fa-caret-square-down me-2"></i>Check In</a>
        <a href="#"><i class="fas fa-caret-square-up me-2"></i>Check Out</a>
    </div>

    <div class="main">
        <div class="card shadow">
            <div class="card-body">
                <form action="">
                    <label for="nama_barang" class="form-label">Item's Name</label>
                    <input type="text" class="form-control" id="nama_barang">

                    <label for="nama_barang" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="nama_barang" min="0">
                    <div class="row">
                        <div class="col">
                            <label for="panjang_barang" class="form-label">Length</label>
                            <input type="number" class="form-control" id="panjang_barang" min="1">
                        
                        </div>
                        <div class="col">
                            <label for="lebar_barang" class="form-label">Width</label>
                            <input type="number" class="form-control" id="lebar_barang" min="1">
                        
                        </div>
                        <div class="col">
                            <label for="tinggi_barang" class="form-label">Heigth</label>
                            <input type="number" class="form-control" id="tinggi_barang" min="1">
                        


                        </div>
                    </div>

                    <label for="tinggi_barang" class="form-label">Supplier</label>
                    <input type="text" class="form-control" id="tinggi_barang">
                </form>
            </div>
        </div>
    </div>

@endsection