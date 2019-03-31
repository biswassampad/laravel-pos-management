@extends('layouts.app')
@section('content')
<div class="container">
    @if ( session()->has('success') )
    <p class="alert alert-success">
                 {{ session()->get('success') }}
              </p>
           @endif
<div class="row justify-content-center">
    <h2 class="add-menu-head">Add Rooms to The Context</h2>
    <div class="container">
        <form method="POST" action="/addtoroom">
            @csrf
            <div class="form-group">
                <label for="itemname">Room Number</label> 
                <input type="text" class="form-control" id="itemname" aria-describedby="ItemNameHelp" placeholder="Room Number.." name="number">
              </div>
              <div class="form-group">
                <label for="itemcatagory">Room Category</label>
                <select class="form-control" name="category">
                    <option>Select Below</option>
                    <option value="1">Royal</option>
                    <option value="2">Exclusive</option>
                    <option value="3">Elegent</option>
                </select>
            </div>
              <div class="form-group">
                    <label for="itemname">Item Price</label> 
                    <input type="text" class="form-control" name="price" id="iteprice" aria-describedby="ItemPriceHelp" placeholder="Item Price">
                    <small id="ItemNameHelp" class="form-text text-muted">Enter the room price here</small>
                  </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    
    </div>
    </div>
</div>
@endsection