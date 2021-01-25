@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>

    <!-- SideNav -->
    <div class="sidenav">
        <a href="{{route('service.index')}}"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="{{route('service.inventory')}}" id="sidenav-active"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="{{route('supplier.index')}}"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="{{route('service.create')}}"><i class="fas fa-sign-in-alt me-2 rotate"></i></i>Create Item</a>
    </div>

    <div class="main">

        <!-- Latest Activity Table -->
        <p class="header">Inventory</p>
        <div class="card shadow">
            <div class="card-body card-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Dimension</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarInventory as $key => $item)
                            <tr>
                                <th scope="row">{{(int)$key + 1}}</th>
                                <td>{{isset($item->namaBarang) ? $item->namaBarang : '-'}}</td>
                                <td>{{isset($item->dimension) ? $item->dimension : '-'}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->namaSupplier}}</td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('service.edit',$item->id)}}" class="btn btn-outline-primary btn-sm mb-3 mr-1">Add/Remove</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
