@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row content-justify-center">
        <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Room Nos</th>
                <th scope="col">Room Type</th>
                <th scope="col">Room Price</th>
                <th scope="col">Availibility</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                        <td>Room No {{$item->RoomNo}}</td>
                        <td>
                            @if($item->RoomType == 1)
                            Royal
                            @elseif($item->RoomType == 2)
                            Exclusive
                            @else
                            Elegent
                            @endif
                        </td>
                        <td>{{$item->RoomPrice}}</td>
                        <td>
                            @if($item->Engaged == 0)
                            Available
                            @else
                            Un Available
                            @endif
                        </td>
                        <td>
                                @if($item->Engaged == 0)
                                <a href="{{url('bookrooms')}}/{{$item->RoomNo}}" class="btn btn-success">Book</a>
                                @else
                                <button href="#"class="btn btn-primary" disabled >Unavilable</button>
                                @endif
                        </td>
                </tr>              
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>

@endsection