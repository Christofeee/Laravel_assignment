<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_car = new Car;
        $new_car->name= $request->name;
        $new_car->price= $request->price;
        $new_car->description= $request->description;
        $new_car->save();
        return redirect('/'); //view ko pyan return pya
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);
        return view('edit_cars', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::find($id);
        $car->name= $request->name;
        $car->price= $request->price;
        $car->description= $request->description;
        $car->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id)->delete();
        return redirect('/');
    }


    //functions for api
    public function get_cars(){
        $cars = Car::get();
        return response()->json([
            'cars'   =>  $cars
        ]);
    }

    public function create_car(Request $request)
    {
        $car = new Car;
        $car->name= $request->name;
        $car->description = $request->description;
        $car->price = $request->price;
        $car->save();
        return response()->json([
            'new_car_info'   =>  $car
        ]);
    }

    public function update_car(Request $request)
    {
        $car = Car::find($request->id);
        $car->update([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price
        ]);
        $car = Car::find($request->id);
        return response()->json([
            "updated_car_info" => $car
        ]);
    }


    public function delete_car(Request $request)
    {
        Car::find($request->id)->delete();
        $cars = Car::get();
        return response()->json([
            "updated_car_info_list"=> $cars
        ]);
        
    }
}
