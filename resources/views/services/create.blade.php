@extends('layouts.master')
<title>Input Barang</title>

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>

    <!-- SideNav -->
    <div class="sidenav">
        <a href="{{route('service.index')}}"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="{{route('service.inventory')}}"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="#"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="#"><i class="fas fa-caret-square-down me-2"></i>Check In</a>
        <a href="#"><i class="fas fa-caret-square-up me-2"></i>Check Out</a>
    </div>


    <h1 class="text-center">Input Barang</h1>
    <br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach ($errors->all() as $errors)
            <li>{{$errors}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="" class="form-group">Nama Barang*</label>
        <div class="input-group mb-3 border border-secondary border rounded">
        <input type="text" value="{{Request::old('namaBarang')}}" class="form-control" placeholder=". . . " name="namaBarang" id="namaBarang">
        </div>

        <label for="" class="form-group">Kode Barang*</label>
        <div class="input-group mb-3 border border-secondary border rounded">
            <input type="text" value="{{Request::old('kodeBarang')}}" class="form-control" placeholder=". . ." name="kodeBarang" id="kodeBarang">
        </div>

        <label for="" class="form-group">Deskripsi Barang*</label>
        <div class="input-group mb-3 border border-secondary border rounded">
            <input type="text" value="{{Request::old('deskripsiBarang')}}" class="form-control" placeholder=". . ." name="deskripsiBarang" id="deskripsiBarang">
        </div>
        <label for="" class="form-group">CV*</label>
        <div class="input-group mb-3 border border-secondary border rounded">
            <input type="file" value="" class="form-control" name="cv" id="cv">
        </div>
        <br>
        <div class="float-right">
            <a href="{{('service')}}" class="btn btn-outline-secondary btn-light btn-lg ">Back</a>
            <button class="btn btn-outline-light btn-secondary btn-lg" type="submit">Save</button>
        </div>

    </form>

@endsection
