<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brand = $request->query('brand');
        $model = $request->query('model');
        $per_page = $request->query('per_page', 5);

        $query = Car::query();

        if ($brand) {
            $query->where('brand', 'like', "%$brand%");
        }
        elseif($model) {
            $query->where('model', 'like', "%$model%");
        }
        $cars = $query->paginate($per_page);

        return response()->json($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCarRequest $request)
    {
        $data = $request->validated();
        $car = Car::create($data);
        return response()->json($car);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $request->validated();
        $car->update($data);

        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
