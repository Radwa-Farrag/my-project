<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;

class CarController extends Controller
{
    private $columns = ['cartitle', 'description' ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /* $cars = Car::get();
        return view('cars',compact('cars'));*/
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('addCar');
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*$cars = new car;
        $cars->cartitle ="BMW";
        $cars->description ="Description Is Here";
        $cars->published =true;
        $cars->save();
        return "Car Data Added Successfully";*/
        $cars = new car;
        $cars->cartitle =$request->cartitle;
        $cars->description =$request->description;
        if(isset($request->published)){
            $cars->published =true;
        }else{
            $cars->published =false;
        }
        $cars->save();
        return "Car Data Added Successfully";


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('cardetails',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //return "Car Id Is ". $id;
        $car = Car::findOrFail($id);
        return view('updatecar',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $data = $request->only($this->columns);
    $data['published']=isset($request['published'])? true:false;
    Car::where('id', $id)->update($data);
    return redirect('cars');
        /*Car::where('id', $id)->update($request->only($this->columns));
        return 'Updated';*/
        
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }
}
