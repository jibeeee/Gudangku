@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>

    <!-- SideNav -->
    <div class="sidenav">
        <a href="{{route('service.index')}}"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="{{route('service.inventory')}}" id="sidenav-active"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="{{route('supplier.index')}}"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="{{route('service.create')}}"><i class="fas fa-sign-in-alt me-2 rotate"></i></i>Check In</a>
        <a href="#"><i class="fas fa-sign-out-alt me-2 rotate-2"></i>Check Out</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarInventory as $key => $item)
                            <tr>
                                <th scope="row">{{(int)$key + 1}}</th>
                                <td>{{isset($item->barang->namaBarang) ? $item->barang->namaBarang : '-'}}</td>
                                <td>{{isset($item->barang->dimension) ? $item->barang->dimension : '-'}}</td>
                                <td>{{$item->quantity}}</td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
