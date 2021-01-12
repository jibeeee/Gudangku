@extends('layouts.app')
<title>Input Barang</title>
@section('content')

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

    <form method="POST" action="{{route('barang.store')}}" enctype="multipart/form-data">
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
            <a href="{{route('barang.index')}}" class="btn btn-outline-secondary btn-light btn-lg ">Back</a>
            <button class="btn btn-outline-light btn-secondary btn-lg" type="submit">Save</button>
        </div>

    </form>

@endsection
