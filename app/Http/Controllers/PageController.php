<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function arrayPaginator($array, $request)
    // {
        
    //     $page = $request->get('page', 1);
    //     $perPage = 16;
    //     $offset = ($page * $perPage) - $perPage;

    //     return new \Illuminate\Pagination\LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
    //         ['path' => $request->url(), 'query' => $request->query()]);
    // }
    public function home()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function index(Request $request)
    {
        if (Auth::user()) {
       $data =  Product::paginate(24);
         
       if ($request->ajax()) {
            return view('frontend.category.produklist', ['data' => $data])->render();  
        }
         return view('frontend.category.category',compact('data'));
                            }
        if (Auth::guest()){
         $data =  Product::paginate(24);
        
        if ($request->ajax()) {
            return view('frontend.category.produklist', ['data' => $data])->render();  
        }
        return view('frontend.category.category',compact('data'));
                            }
       
    }

    public function indexlist()
    {
        return view('frontend.category.produklist');
    }

     public function cek()
    {
        return view('frontend.category.cek_category');
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postreq() // Guzzle retrieve province data from RajaOngkir
    {
         $client = new \GuzzleHttp\Client();
            $response = $client->get('https://api.rajaongkir.com/starter/province',
                ['headers' => [
                    'Content-Type' => 'application/json',
                    'key'          => 'f214df40871ea3e93f87058943919b31',
                    ]
                ]);
        $response = $response->getBody();
        // return response()->json($response);
        // return $response;
        //Decode the json so you can access the objects.. (array)
        $json = json_decode($response,true);
        // dd($json);
        //Access the object you want
        // return $json;
        $province = $json['rajaongkir']['results'];
        $var =  response()->json(['data'=> $province]);
        // return $var; 
        // $select2 = '<option value="" hidden >Select...</option>';
        $select = '';
        foreach ($json['rajaongkir']['results'] as $key => $value) {

            // $select .= $value['province_id'] ; 
            // dd($select);
            $select .= '<option value="'.$value['province_id'].'">'.$value['province'].'</option>';
        }
        $select2['provinsi'] = $select;
        return response()->json($select2);
       
    }

    public function postreq_kota()
    {
        $client = new \GuzzleHttp\Client();
            $response = $client->get('https://api.rajaongkir.com/starter/city',
                ['headers' => [
                    'Content-Type' => 'application/json',
                    'key'          => 'f214df40871ea3e93f87058943919b31',
                    ]
                ]);
        $response = $response->getBody();
        // return response()->json($response);
        // return $response;
        //Decode the json so you can access the objects.. (array)
        $json = json_decode($response,true);
        // dd($json);
        //Access the object you want
        // return $json;
        $kota = $json['rajaongkir']['results'];
        $var =  response()->json(['data'=> $kota]);
        // return $var; 
        // $select2 = '<option value="" hidden >Select...</option>';
        $select = '';
        foreach ($json['rajaongkir']['results'] as $key => $value) {

            // $select .= $value['province_id'] ; 
            // dd($select);
            $select .= '<option value="'.$value['city_id'].'">'.$value['type'].'&nbsp'.$value['city_name'].'</option>';
        }
        $select2['kota'] = $select;
        return response()->json($select2);
    }

    public function thankyou()
    {
        return view('frontend.thankyou',compact('data'));
    }

    public function hadoop()
    {
        $hdfs = new WebHDFS('169.254.89.246', '12168', 'dr.who');
        $response = $hdfs->open('/user/Hadoop/coba/tes.txt');
        dd($response);
        return view('frontend.hadoop',compact('data'));
    }
}
