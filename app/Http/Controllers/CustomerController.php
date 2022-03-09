<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('all')){
            return Customer::orderBy('id','desc')->get();
        }
        return Customer::orderBy('id','desc')->with('membership')->paginate(10);
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
            'name' => 'required',
            'membership_id' => 'required|integer',
            'dob' => 'required|date|before:12 years ago',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->membership_id = $request->membership_id;
        $customer->dob = $request->dob;
        $customer->save();

        return ['message' => 'Customer Added sucessfull !'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
         $request->validate([
            'name' => 'required',
            'membership_id' => 'required|integer',
            'dob' => 'required|date|before:12 years ago',
        ]);

        $customer->name = $request->name;
        $customer->membership_id = $request->membership_id;
        $customer->dob = $request->dob;
        $customer->save();

        return ['message' => 'Customer updated sucessfull !'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return [
            'message' => 'Customer Deleted!'
        ];
    }
}
