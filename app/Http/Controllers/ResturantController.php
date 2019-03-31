<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    public function additemtomenu(Request $request){
        $item=DB::table('items')->insert([
            'name'=>$request->name,
            'category'=>$request->category,
            'type'=>$request->type,
            'price'=>$request->price
        ]);

        return redirect()->back()->with('success','Item Added Successfully');
    }

    public function getitems(){
        $item=DB::table('items')->get();
       return response()->json($item);
    }
   public function searchitem(Request $request){
        $search = $request->get('query');
       $items = DB::table('items')->where('name','like',"%$search%")->get();
       return response()->json($items);
   }
   public function addtable(Request $request){
       $table = DB::table('tables')->insert([
           'tableno'=>$request->tableno,
           'capacity'=>$request->capacity
       ]);
       return redirect()->back()->with('success','Table Added Successfully');
   }
   public function gettablesfour(){
       $tables=DB::table('tables')->where('capacity',4)->where('available',1)->get();
       return response()->json($tables);
   }
   public function gettablessix(){
    $tables=DB::table('tables')->where('capacity',6)->where('available',1)->get();
    return response()->json($tables);
}
    public function addorderres(Request $request){
        $rand = rand(10000,999999);
        $time = \Carbon\Carbon::now()->toDateTimeString();
       $order=DB::table('resorders')->insert([
            'orderno' => $rand,
            'name'=>$request->name,
            'tableno'=>$request->tableno,
            'members'=>$request->members,
            'mobileno'=>$request->mobile,
            'created_at'=>$time,
            'updated_at'=>$time,
       ]);
        $table=$request->tableno;
        $engage=DB::table('tables')->where('tableno',$table)->update([
            'available'=>0
        ]);
        return response()->json($rand);

    }
    public function gettables(){
        $tables=DB::table('resorders')->get();

        return view('addorderres',compact('tables'));
    }
    public function getpriceofitem($id){
        $price = DB::table('items')->where('id',$id)->get();

        return response()->json($price);
    }
    public function getdetailsidwise($id){
        $details = DB::table('items')->where('id',$id)->get();
        return response()->json($details);
    }
    public function additemtoorder(Request $request,$id){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $item=DB::table('resoitems')->insert([
            'orderId'=>$id,
            'itemid'=>$request->id,
            'itemname'=>$request->name,
            'itemqnty'=>$request->amount,
            'amount'=>$request->value,
            'created_at'=>$time,
            'updated_at'=>$time,
        ]);
        return response()->json($item);
    }
    public function getallorders(){
        $tables=DB::table('resorders')->get();
        return response()->json($tables);
    }
    public function getperticularorder($id){
        $detailsorder = DB::table('resoitems')->where('orderid',$id)->get();
        return response()->json($detailsorder); 
    }
    public function getordered($id){
        $detailsorder = DB::table('resoitems')->where('orderid',$id)->get();
        return view('additem2this',compact('detailsorder'));
    }
    public function billget($id){
        $detailbill = DB::table('resoitems')->where('orderid',$id)->get();
        $detailcustomer = DB::table('resorders')->where('orderno',$id)->get();
        $amounts=DB::table('resoitems')->where('orderid',$id)->get('amount')->toArray();    
        $sum = array_sum($amounts);
        return view('billkot',compact('detailbill','detailcustomer','sum','amounts'));
    }
    public function getTableNumber($id){
        $table = DB::table('resorders')->where('orderno',$id)->get('tableno');

        return response()->json($table);
    }
    Public function inactiveOrder(Request $request){
        $time = \Carbon\Carbon::now()->toDateTimeString();
        $table = DB::table('resorders')->where('orderno',$id)->update([
            'status'=>0,
            'updated_at'=>$time,
        ]);

        return response()->json($table);
    }
}
