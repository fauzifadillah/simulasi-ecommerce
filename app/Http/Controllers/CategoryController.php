<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('CategoryName')->get(); 
        $select = '';

        foreach ($category as $key => $value) {
            $select .= '<li> <a href="#" class="kategori" data-filter=".'.$value->CategoryName.'">'.$value->CategoryName.'</a></li>'    ;
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
        'CategoryName'=>'required',
        'Description'=> 'required'
      ]);
    
       
    
         $category = $request->all();
       
        $cat = Category::create($category);
        $cat->save();
        if ($cat){
            return response()->json([
            'success' => true,
            'message' => 'Category Created'
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
            $category = Category::find($id);
            return $category;

        // return view('shares.edit', compact('share'));
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
        $category = Category::findOrFail($id);
        
        $category->CategoryName = $request->CategoryName;
        $category->Description = $request->Description;

        
        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Category Updated' ]);
        // $category->CategoryName = $request->get('CategoryName');
        // $category->Description = $request->get('Description');
        // $category->save();
        // return redirect('/category')->with('success','Berhasil diubah');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

       $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category Deleted'
        ]);
    }


    public function table()

    {
           $category = Category::all();
 
            return Datatables::of($category)
            
            ->addColumn('action', function($category){
                return ' ' .
                       '<a onclick="editForm('. $category->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                       '<a onclick="deleteData('. $category->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
    }

     public function productlist()
    {
        $category = Product::select('CategoryID','ProductName','Price','photo')->get();
        $select = '';

        foreach ($category as $key => $value) {
            $select .=    '<div  class="product-item '.$value->CategoryID.'" style="padding-left: 4px; display: inline-block;">
                                        <div class="product discount product_filter">
                                            <div class="product_image">
                                                <img src='.$value->photo.' alt="">
                                            </div>
                                            <div class="favorite "></div>
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                            <div class="product_info">
                                                <h6 class="product_name" >'.$value->ProductName.'<a href="single.html">-</a></h6>
                                                <div class="product_price"> '.$value->Price.'</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>'  ;
        
        }
                        

        return $select;


    }




                                    // '<div  class="product-item men">
                                    //     <div class="product discount product_filter">
                                    //         <div class="product_image">
                                    //             <img src="images/product_1.png" alt="">
                                    //         </div>
                                    //         <div class="favorite favorite_left"></div>
                                    //         <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                    //         <div class="product_info">
                                    //             <h6 class="product_name" >'.$value->ProductName.'<a href="single.html">-</a></h6>
                                    //             <div class="product_price">$520.00<span>$590.00</span></div>
                                    //         </div>
                                    //     </div>
                                    //     <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    // </div>'
public function arrayPaginator($array, $request)
    {
        $page = $request->get('page', 1);
        $perPage = 16;
        $offset = ($page * $perPage) - $perPage;

        return new \Illuminate\Pagination\LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }



}