<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function addnewroom(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $room = DB::table('hotel_rooms')->insert([
                'RoomNo'=>$request->number,
                'RoomType'=>$request->category,
                'RoomPrice'=>$request->price,
                'created_at'=>$time,
                'updated_at'=>$time,
        ]);
        return redirect()->back()->with('success','Room Added Successfully');
    }
    public function getavailable(){
        $rooms = DB::table('hotel_rooms')->get();
        return view('roomscheck',compact('rooms'));
    }
    public function addcustomer(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $customer=DB::table('hotel_customers')->insert([
            'Name'=>$request->name,
            'Address'=>$request->address,
            'Phone'=>$request->phone,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);
        return redirect()->back()->with('success','Customer Added Successfully');
    }
    public function getcustomers(){
        $customer=DB::table('hotel_customers')->get();
        return view('roombook',compact('customer'));
    }
    public function getvacantrooms($id){
        $rooms = DB::table('hotel_rooms')->where('Engaged',0)->get();
        $customer=DB::table('hotel_customers')->where('id',$id)->get();
        return view('addtoroom',compact('rooms','customer'));
    }
    }

