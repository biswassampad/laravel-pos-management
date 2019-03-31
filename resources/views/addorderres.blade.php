@extends('layouts.app')
@section('content')
<nav class="navbar navbar-light bg-light">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Add Customer
</button>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>
<div class="container">
    <div class="row justify-content-center">
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Customer For Table</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <add-customer-res></add-customer-res>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
         
    </div>
    <div class="row">
            <table class="table table-striped table-hover table-dark">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Table No</th>
                    <th scope="col">Order No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                  <tr>
                    <th scope="row">{{$table->id}}</th>
                    <td>{{$table->tableno}}</td>
                    <td>{{$table->orderno}}</td>
                    <td>{{$table->name}}</td>
                    <td><a href="{{ url('billkot')}}/{{$table->orderno}}" class="btn btn-success">Print Bill</a>
                        <a href="{{ url('additem2this')}}/{{$table->orderno}}" class="btn btn-warning">Add Items</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
    </div>
</div>

@endsection