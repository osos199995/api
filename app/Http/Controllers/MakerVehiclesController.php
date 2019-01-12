<?php

namespace App\Http\Controllers;

use App\makers;
use App\vehicle;
use http\Env\Response;
use Illuminate\Http\Request;


class MakerVehiclesController extends Controller
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


    public function store(Request $request,$makerID)
    {
        $request->validate([
            "color"=>'required',
            "speed"=>'required',
            "power"=>'required',
            "capcity"=>'required'


        ]);
        $maker=makers::find($makerID);
        if(!$maker){

            return response()->json(['message'=>'there is no maker','code'=>'404'],404);
        }
        $values=$request->all();
        $maker->veihcle()->create($values);
        return response()->json(['message'=>'the vehicle have been added'],202);
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
    public function update(Request $request, $makerId , $vechileId)
    {
        $maker = makers::find($makerId);


        if(!$maker){
return response()->json(['message'=>'there isn no maker'],404);
        }
        $vehicle =$maker->vehicle->find($vechileId);
        if(!$vehicle){
            return Response()->json(['message'=>'there is no vehicles here'],404);
        }

        $color =$request->get('color');
        $speed =$request->get('speed');
        $power =$request->get('power');
        $capacity =$request->get('capacity');

        $vehicle->color =$color;
        $vehicle->speed =$speed;
        $vehicle->power =$power;
        $vehicle->capacity =$capacity;

        $vehicle->save();
        return response()->json(['message'=>'the vehicle have been updated'],200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($makerID,$vehileID)
    {
        $maker = makers::find($makerID);
        if (!$maker) {
            return response()->json(['message' => 'this maker does not exist', 'code' => '404', 404]);
        }


        $vehicle = $maker->vehicle->find($vehileID);

        if (!$vehicle)
        {

            return response()->json(['message' => "this vehicle  have been deleted before or there is no exist of this vehicle "], 200);

        }
        $vehicle->delete();
        return response()->json(['message' => "this vehicle  have been deleted "], 200);
    }
}

