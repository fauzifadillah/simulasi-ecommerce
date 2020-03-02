<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        'Nama'=>'required',
        'Alamat'=> 'required',
        'Kota'=>'required',
        'kode_pos'=>'required',
        'email'=>'required',
        'no_hp'=>'required'

      ]);
    
       
    
         $customer = $request->all();
       
        $cus = Customer::create($customer);
        $cus->save();
        if ($cus){
            return response()->json([
            'success' => true,
            'message' => 'Customer Created'
        ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return $customer;    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        
        $customer->Nama   = $request->Nama;
        $customer->Alamat = $request->Alamat;
        $customer->Kota   = $request->Kota;
        $customer->kode_pos   = $request->kode_pos;
        $customer->email   = $request->email;
        $customer->no_hp   = $request->no_hp;

        
        $customer->save();

        return response()->json([
            'success' => true,
            'message' => 'Customer Updated' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Customer Deleted'
        ]);
    }

     public function table()
    {
           $customer = Customer::all();
 
            return Datatables::of($customer)
            
            ->addColumn('action', function($customer){
                return ' ' .
                       '<a onclick="editForm('. $customer->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                       '<a onclick="deleteData('. $customer->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
}
