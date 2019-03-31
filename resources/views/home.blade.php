@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card dashboard-card">
            <div class="card-body">
              <h3 class="card-title">Resturant Orders</h3>
              <a href="{{ url('addorderres')}}" class="btn btn-warning dashboard-button">Go somewhere</a>
            </div>
          </div>
         
          <div class="card dashboard-card"  @onclick="window.location.href='#'">
            <div class="card-body">
              <h3 class="card-title">Hotel Orders</h3>
              <a href="{{ url('addorderhotel')}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card dashboard-card"  @onclick="window.location.href='#'">
            <div class="card-body">
              <h3 class="card-title">Event Orders</h3>
              <a href="{{ url('addorderevent')}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card dashboard-card"  @onclick="window.location.href='#'">
            <div class="card-body">
              <h3 class="card-title">Check Room Availibility</h3>
              <a href="{{ url('roomscheck')}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card dashboard-card"  @onclick="window.location.href='#'">
            <div class="card-body">
              <h3 class="card-title">Book Room</h3>
              <a href="{{ url('roombook')}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card dashboard-card"  @onclick="window.location.href='#'">
            <div class="card-body">
              <h3 class="card-title">Hotel CheckOut</h3>
              <a href="{{ url('roomcheckout')}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card dashboard-card"  @onclick="window.location.href='#'">
            <div class="card-body">
              <h3 class="card-title">Events</h3>
              <a href="{{ url('bookevent')}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card dashboard-card"  @onclick="window.location.href='#'">
            <div class="card-body">
              <h3 class="card-title">Settings</h3>
              <a href="{{ url('settings')}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card dashboard-card"  @onclick="window.location.href='#'">
            <div class="card-body">
              <h3 class="card-title">Reports</h3>
              <a href="{{ url('reports')}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
</div>
</div>
@endsection
