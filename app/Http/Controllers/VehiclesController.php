<?php

namespace App\Http\Controllers;

use App\vehicle;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles =vehicle::all();
        return response()->json(['data'=>$vehicles],200);
    }


}
