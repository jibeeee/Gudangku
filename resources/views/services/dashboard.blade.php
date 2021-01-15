@extends('layouts.master')

@section('content')
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"/>
    
    <!-- SideNav -->
    <div class="sidenav">
        <a href="#">Dashboard</a>
        <a href="#">Inventory</a>
        <a href="#">Supplier</a>
        <a href="#">Check In</a>
        <a href="#">Check Out</a>
    </div>

    <div class="main">
        
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