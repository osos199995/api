<?php

namespace App\Http\Controllers;

use App\makers;
use App\vehicle;
use http\Env\Response;
use Illuminate\Http\Request;


class MakerVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $maker =makers::find($id);

        if(!$maker){
    return response()->json(['message'=>'there is no maker','code'=>'404'],404);
}

return response()->json( ['data'=> $maker->vehicle  ] ,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , $vehicleId)
    {

            vehicle::all();
            $maker=makers::find($id);
            if(!$maker){

                return response()->json(['message'=>'there is no maker','code'=>'404'],404);
            }

            $vehicle=$maker->vehicle->find($vehicleId);
            if(!$vehicle){

                return response()->json(['message'=>'there is no vehicle','code'=>'404'],404);
            }


            return response()->json( ['data'=> $vehicle] ,200);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
