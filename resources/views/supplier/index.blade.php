@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>

    <!-- SideNav -->
    <div class="sidenav">
       <a href="{{route('service.index')}}"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="{{route('service.inventory')}}"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="{{route('supplier.index')}}"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="{{route('service.create')}}"><i class="fas fa-sign-in-alt me-2 rotate"></i></i>Check In</a>
        <a href="#"><i class="fas fa-sign-out-alt me-2 rotate-2"></i>Check Out</a>
    </div>

    <div class="main">

        <!-- Supplier Table -->
        <p class="header">Supplier</p>
        <div class="card shadow">
            <div class="card-body card-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarSupplier as $key => $item)
                            <tr>
                                <th scope="row">{{(int)$key + 1}}</th>
                                <td>{{isset($item->namaSupplier) ? $item->namaSupplier : '-'}}</td>
                                <td>{{isset($item->alamatSupplier) ? $item->alamatSupplier : '-'}}</td>
                                <td>{{isset($item->nomorSupplier) ? $item->nomorSupplier : '-'}}</td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{route('supplier.create')}}" class="btn btn-primary btn-sm">Create Supplier</a>
        <button type="button" class="btn btn-secondary">Edit</button>

    </div>
@endsection
