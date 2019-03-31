@extends('layouts.app')
@section('content')
<div class="container">
        @if ( session()->has('success') )
        <p class="alert alert-success">
                     {{ session()->get('success') }}
                  </p>
               @endif
    <div class="row content-justify-center">
        <form action="/addtableid" method="POST" class="col-md-12">
            @csrf
            <div class="form-group">
                <label for="tableno">Table No</label>
                <input type="text" id="tableno" name="tableno" class="form-control">
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <select name="capacity" id="capacity" class="form-control">
                    <option value="">Select Below</option>
                    <option value="6">6 Persons</option>
                    <option value="4">4 Persons</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection