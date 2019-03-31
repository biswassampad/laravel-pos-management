@extends('layouts.app')
@section('content')
    <div class="container">
            @if ( session()->has('success') )
            <p class="alert alert-success">
                         {{ session()->get('success') }}
                      </p>
                   @endif
        <div class="row justify-content-center">
            <h2 class="add-menu-head">Add item to the menu</h2>
            <div class="container">
                <form method="POST" action="/addtomenu">
                    @csrf
                    <div class="form-group">
                        <label for="itemname">Item Name</label> 
                        <input type="text" class="form-control" id="itemname" aria-describedby="ItemNameHelp" placeholder="Item Name" name="name">
                        <small id="ItemNameHelp" class="form-text text-muted">Enter the item name here</small>
                      </div>
                      <div class="form-group">
                        <label for="itemcatagory">Item Category</label>
                        <select class="form-control" name="category">
                            <option>Select Below</option>
                            <option value="1">Veg</option>
                            <option value="2">Veg with Egg</option>
                            <option value="3">Non Veg</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="itemcatagory">Item Type</label>
                        <select class="form-control" name="type">
                            <option>Select Below</option>
                            <option value="1">Starter</option>
                            <option value="2">Main Course</option>
                            <option value="3">Desert</option>
                            <option value="4">Breakfast/Snacks</option>
                            <option value="5">Drinks/Beverages</option>
                        </select>
                      </div>
                      <div class="form-group">
                            <label for="itemname">Item Price</label> 
                            <input type="text" class="form-control" name="price" id="iteprice" aria-describedby="ItemPriceHelp" placeholder="Item Price">
                            <small id="ItemNameHelp" class="form-text text-muted">Enter the item price here</small>
                          </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            
            </div>
            </div>
    </div>
@endsection