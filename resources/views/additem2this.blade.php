@extends('layouts.app')
@section('content')
<nav class="navbar navbar-light bg-light">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Add Order
    </button>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
      <div class="container">
          <div class="row">
                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content thanos">
                                <food-item></food-item>
                          </div>
                        </div>
                      </div>
        
          </div>
          <div class="row">
                @if(count($detailsorder)==0)
                No Orders Yet
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Order
                </button>
                @endif
             @if(count($detailsorder)>0)
             <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($detailsorder as $order)
                      <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->itemname}}</td>
                        <td>{{$order->itemqnty}}</td>
                        <td>{{$order->amount}}</td>
                        <td><a href="{{ url('delitemhotel')}}/{{$order->id}}" class="btn btn-danger">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            
          </div>
          <div class="row content-justify-center">
              <a href="#" class="btn btn-success">Confirm & Generate KOT</a>
              <td><a href="{{ url('billkot')}}/{{$detailsorder[0]->orderId}}" class="btn btn-danger">Print Bill</a></td>
          </div>
          @endif
      </div>

@endsection