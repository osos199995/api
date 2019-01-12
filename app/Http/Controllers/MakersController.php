<?php

namespace App\Http\Controllers;
use App\makers;
use Illuminate\Http\Request;

use App\Http\Middleware\OnceAuth;
class MakersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth.basic.once',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makers=makers::all();

        return view('hi',compact('makers'));


//        return response()->json(['data' => $makers] ,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
        ]);


                $values=$request->only(['name','phone']);
                makers::create($values);
                return response()->json(['message'=>'the maker have been added'],202);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maker =makers::find($id);
        if(!$maker){
            return  response()->json(['message'=>'this maker does not exist','code'=>'404',404]);
        }
        return response()->json(['data'=>$maker],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $request->validate([
//            'name'=>'required',
//            'phone'=>'required',
//        ]);

        $maker =makers::find($id);
        if(!$maker){
            return  response()->json(['message'=>'this maker does not exist','code'=>'404',404]);
        }
        $name =$request->get('name');
        $phone =$request->get('phone');

        $maker->name=$name;
        $maker->phone=$phone;

        $maker->save();
        return response()->json(['message'=>'the maker have been updated'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maker =makers::find($id);
        if(!$maker){
            return  response()->json(['message'=>'this maker does not exist','code'=>'404',404]);
        }
        $vehicle= $maker->vehicle;
        if(sizeof($vehicle) > 0){
            return  response()->json(['message'=>'this maker have vehicle delete it first ','code'=>'404',404]);
        }
        $maker->delete();
        return response()->json(['message'=> "this maker have been deleted "],200);
    }
}
