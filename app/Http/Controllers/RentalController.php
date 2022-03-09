<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rental::orderBy('id','desc')->with(['customer','movies'])->paginate(10);
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
            'customer_id' => 'required|integer',
            'movie' => 'required|array'
        ]);

        $rental = new Rental();
        $rental->customer_id = $request->customer_id;
        $rental->save();

        foreach ($request->movie as $value) {
             $rental->movies()->attach($value);
        }


        return ['message' => 'Rented sucessfull !'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental $rental)
    {
         $request->validate([
            'customer_id' => 'required|integer',
            'movie' => 'required|array'
        ]);

        foreach ($rental->movies as $value) {
            $rental->movies()->detach($value->id);
        }

        $rental->customer_id = $request->customer_id;
        $rental->save();

        foreach ($request->movie as $value) {
            $rental->movies()->attach($value);
        }

        return ['message' => 'Rental updated sucessfull !'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        foreach ($rental->movies() as $value) {
             $rental->movies()->detach($value);
        }
        $rental->delete();

        return [
            'message' => 'Rental Deleted!'
        ];
    }
}
