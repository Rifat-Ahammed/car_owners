<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchCarName = $request->session()->get('searchCarName');
        if($searchCarName!=null){
            $cars=Car::where('reg_number', 'like', $searchCarName)->
            orWhere('brand', 'like', $searchCarName)->
            orWhere('model', 'like', $searchCarName)->
            with('owner')->get();
        }else{
            $cars=Car::with('owner')->get();
        }
        return view("cars.index", [
            "cars"=>$cars,
            "searchCarName"=>$searchCarName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cars.create", ["owners"=>Owner::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reg_number'=>'required|size:7',
            'brand'=>'required',
            'model'=>'required',
            'owner_id'=>'required'
        ], [
            "reg_number"=>__("Registration number is required and must be in format [ABC 123]"),
            "brand"=>__("Brand is required"),
            "model"=>__("Model is required"),
            "owner_id"=>__("Choose an owner for the new car")
        ]);
        $car = new Car();
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();

        return redirect()->route("cars.index");




    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view("cars.edit", ["car"=>$car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {

        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
//        $car->owner_id=$request->owner_id;
        $car->save();

        return redirect()->route("cars.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route("cars.index");
    }

    public function search(Request $request){
        $request->session()->put('searchCarName', $request->name);
        return redirect()->route("cars.index");
    }
}
