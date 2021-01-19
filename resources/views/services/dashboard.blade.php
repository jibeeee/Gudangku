@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>

    <!-- SideNav -->
    <div class="sidenav">
        <a href="{{route('service.index')}}"><i class="fas fa-th-large me-2"></i>Dashboard</a>
        <a href="{{route('service.inventory')}}"><i class="fas fa-box me-2"></i>Inventory</a>
        <a href="#"><i class="fas fa-truck me-2"></i>Supplier</a>
        <a href="#"><i class="fas fa-sign-in-alt me-2"></i></i>Check In</a>
        <a href="#"><i class="fas fa-sign-out-alt me-2"></i>Check Out</a>
    </div>

    <div class="main">

        <!-- Status Bar -->
        <div class="bar">
            <p>Total Available Space</p>
            <div class="progress shadow">
                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
            </div>

        </div>

        <!-- Hightlight Box -->
        <div class='row'>
            <div class='col'>
                <div class="card shadow">
                    <div class="card-body">
                        <p class='card-highlight purple'>1000</p>
                        <p class='card-text'>Total Stocks</p>
                    </div>
                </div>
            </div>
            <div class='col'>
                <div class="card shadow">
                    <div class="card-body">
                        <p class='card-highlight green'>1000</p>
                        <p class='card-text'>Number of Check In</p>
                    </div>
                </div>
            </div>
            <div class='col'>
                <div class="card shadow">
                    <div class="card-body">
                        <p class='card-highlight red'>1000</p>
                        <p class='card-text'>Number of Check In</p>
                    </div>
                </div>
            </div>
            <div class='col'>
                <div class="card shadow">
                    <div class="card-body">
                        <p class='card-highlight grey'>1000</p>
                        <p class='card-text'>Total Suppliers</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Activity Table -->
        <p class="header">Latest Activity</p>
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
                        @foreach ($daftarActivity as $key => $item)
                            <tr>
                                <th scope="row">{{(int)$key + 1}}</th>
                                <td>{{isset($item->barang->namaBarang) ? $item->barang->namaBarang : '-'}}</td>
                                <td>{{isset($item->barang->dimension) ? $item->barang->dimension : '-'}}</td>
                                <td>{{$item->value_quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody> --}}
                </table>
            </div>
        </div>


    </div>
@endsection
