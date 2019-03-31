@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row content-justify-center">
        <a href="{{ url('additem')}}" class="btn btn-success">Add Item</a>
        <a href="{{ url('addroom')}}" class="btn btn-danger">Add Room</a>
    </div>
</div>
@endsection