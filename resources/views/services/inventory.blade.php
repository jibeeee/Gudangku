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

        <!-- Latest Activity Table -->
        <p class="header">Latest Activity</p>
        <div class="card shadow">
            <div class="card-body card-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
        

    </div>
@endsection