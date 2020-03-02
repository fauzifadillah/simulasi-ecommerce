<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('id','CategoryName')->get();

        $select = '<option value="" hidden >Select...</option>';

        foreach ($category as $key => $value) {
            $select .= '<option value="'.$value->id.'">'.$value->CategoryName.'</option>';
        }
        $data['Category'] = $select;
        return response()->json($data);
    }

    public function produkdetail()
    {
        $product = Product::select('ProductName')->get();
        $select = '';

        foreach ($product as $key => $value) {
            $select .= '<li> <a href="#">'.$value->ProductName.'</a></li>'    ;
        }




        return $select;
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
        'CategoryID'=>'required',
        'SKU'=> 'required',
        'ProductName'=> 'required',
        'ProductDescription'=> 'required',
        'QTY'=> 'required',
        'Price'=> 'required',
        'AvailSize'=> 'required',
        'AvailColor'=> 'required',
        'Size'=> 'required',
        'Color'=> 'required'
      ]);


         $product = $request->all();
         $product['photo'] = null;
      if ($request->hasFile('photo')){
            $product['photo'] = '/upload/photo/'.time().'.'.$request->photo->getClientOriginalExtension();
            $filename = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/upload/photo/'), $filename);
                                    }
        $prod = Product::create($product);
        $prod->save();
        if ($prod){
            return response()->json([
            'success' => true,
            'message' => 'Product Created'
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
        $product = Product::find($id);
        return view('frontend.product.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $product = Product::find($id);

         $category = Category::select('id','CategoryName')->get();

        $select = '<option value="" hidden >Select...</option>';

        foreach ($category as $key => $value) {
            $select .= '<option value="'.$value->id.'">'.$value->CategoryName.'</option>';
        }
        $data['Category'] = $select;
        $data['Product'] = $product;

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
        $product = Product::findOrFail($id);
        if ($request->hasFile('photo')){
            if ($product->photo !== NULL){
                unlink(public_path($product->photo));
            }

        }
        $product->CategoryID = $request->CategoryID;
        $product->SKU = $request->SKU;
        $product->ProductName = $request->ProductName;
        $product->ProductDescription = $request->ProductDescription;
        $product->QTY = $request->QTY;
        $product->Price = $request->Price;
        $product->AvailSize = $request->AvailSize;
        $product->AvailColor = $request->AvailColor;
        $product->Size = $request->Size;
        $product->Color = $request->Color;
        $product->photo = $request->photo;

         $product['photo'] = '/upload/photo/'.time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/upload/photo/'), $product['photo']);

        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'Product Updated' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
         if (!$product->photo == NULL){
            unlink(public_path($product->photo));
        }
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product Deleted'
        ]);
    }

     public function table()
    {
           $product = Product::all();

            return Datatables::of($product)
            ->addColumn('photo', function($product){
                if ($product->photo == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($product->photo) .'" alt="">';
            })
            ->addColumn('action', function($product){
                return ' ' .
                       '<a onclick="editForm('. $product->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                       '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->addColumn('CategoryID', function($product){
                return $product->category->CategoryName;

            })


            ->rawColumns(['photo','action'])->make(true);
    }

    public function frontend()
    {
        return view('frontend.product.product');
    }
}
