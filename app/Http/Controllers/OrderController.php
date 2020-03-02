<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use App\Customer;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumer = Customer::select('id','Nama')->get(); 
        $select = '<option value="" hidden >Select...</option>';
        foreach ($costumer as $key => $value) {
            $select .= '<option value="'.$value->id.'">'.$value->Nama.'</option>';
        }
        

        $payment = Payment::all();
        $selectpay = '<option value="" hidden >Select...</option>';
        foreach ($payment as $key => $value) {
            $selectpay .= '<option value="'.$value->id.'">'.$value->PaymentType.'</option>';
        }
        $data['Customer'] = $select;
        $data['Payment'] = $selectpay;

        return response()->json($data);
    }

    //     public function create_payment()
    // {
        
    //     return response()->json($data);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'CustomerID'=>'required',
        'OrderNumber'=> 'required',
        'PaymentType'=>'required',
        'OrderDate'=>'required',
        'Status'=>'required'

        ]);

        $order = $request->all();
       
        $ord = Order::create($order);
        $ord->save();
        if ($ord){
            return response()->json([
            'success' => true,
            'message' => 'Order Created'
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
        $order = Order::find($id);
        $customer = Customer::select('id','Nama')->get();
        
        $select = '<option value="" hidden >Select...</option>';
        foreach ($customer as $key => $value) {
            $select .= '<option value="'.$value->id.'">'.$value->Nama.'</option>';
        }
        $payment = Payment::all();
        $selectpay = '<option value="" hidden >Select...</option>';
        foreach ($payment as $key => $value) {
            $selectpay .= '<option value="'.$value->id.'">'.$value->PaymentType.'</option>';
        }
        $data['Customer'] = $select;
        $data['Order'] = $order;
        $data['Payment'] = $selectpay;
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Order::findOrFail($id);
        
        $data->CustomerID   = $request->CustomerID;
        $data->OrderNumber = $request->OrderNumber;
        $data->PaymentType   = $request->PaymentType;
        $data->OrderDate   = $request->OrderDate;
        $data->Status   = $request->Status;

        
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Order Updated' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $order = Order::findOrFail($id);
        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order Deleted'
        ]);
    }

    public function table()
    {
           $order = Order::all();
 // $order = Order::with('Customer')->get();
 
            return Datatables::of($order)
            
            ->addColumn('action', function($order){
                return ' ' .
                       '<a onclick="editForm('. $order->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                       '<a onclick="deleteData('. $order->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })

            ->addColumn('NamaCostumer', function($order){
                return $order->customer->Nama;
            })

            ->addColumn('PaymentType', function($order){
                return $order->payment->PaymentType;
                
            })
            ->rawColumns(['action'])->make(true);


    }
}
