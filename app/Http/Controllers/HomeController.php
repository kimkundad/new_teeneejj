<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use App\category;
use App\product;
use App\bank;
use App\wishlist;
use App\pay_order;
use App\order;
use App\subscribe;
use App\getproduct;
use App\order_detail;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
   {


     $text = DB::table('text_settings')
            ->where('id', 1)
            ->first();
     $data['text'] = $text;

     $products = DB::table('proshops')->select(
           'proshops.*'
           )
           ->where('status', 1)
           ->limit(12)
           ->get();

     $shop = DB::table('product')->select(
           'product.*'
           )
           ->where('first', 1)
           ->orderBy('priority', 'asc')
           ->limit(12)
           ->get();

           $cat = DB::table('category')->select(
                  'category.*'
                  )
                  ->whereBetween('id', [18, 22])
                  ->where('id', '!=', 0)
                  ->get();

          foreach ($cat as $obj1) {

            $options = DB::table('product')
                  ->select(
                  'product.*'
                  )
                  ->where('category_id', $obj1->id)
                  ->count();
            $obj1->options = $options;
          }


          $cat2 = DB::table('category')->select(
                 'category.*'
                 )
                 ->whereBetween('id', [23, 27])
                 ->where('id', '!=', 0)
                 ->get();

         foreach ($cat2 as $obj2) {

           $options = DB::table('product')
                 ->select(
                 'product.*'
                 )
                 ->where('category_id', $obj2->id)
                 ->count();
           $obj2->options = $options;
         }


         $cat3 = DB::table('category')->select(
                'category.*'
                )
                ->whereBetween('id', [28, 32])
                ->where('id', '!=', 0)
                ->get();

        foreach ($cat3 as $obj3) {

          $options = DB::table('product')
                ->select(
                'product.*'
                )
                ->where('category_id', $obj3->id)
                ->count();
          $obj3->options = $options;
        }

        $shop_count = DB::table('product')->select(
                 'product.*'
                 )
                 ->count();

    //  dd($varlues);

      $set_point = 0;
      $data['products'] = $products;
     $data['shop_count'] = $shop_count;
     $data['set_point'] = $set_point;
     $data['shop'] = $shop;
     $data['category1'] = $cat;
     $data['category2'] = $cat2;
     $data['category3'] = $cat3;

       return view('welcome', $data);
   }


   public function add_session_value(Request $request){

      $id = $request->input('product_id');
      $quantity = $request->input('quantity');

    $product = DB::select('select * from proshops where id='.$id);
    $cart = Session::get('cart');
    $cart[$product[0]->id] = array(
        "id" => $product[0]->id,
        "nama_product" => $product[0]->name_pro,
        "price" => $product[0]->price,
        "image" => $product[0]->image_pro,
        "qty" => $quantity,
        "shipping_price" => $product[0]->shipping_price,
    );

    Session::put('cart', $cart);


    return redirect(url('product/'.$id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    //  dd(Session::get('cart'));
      // return redirect(url('booking_cars'));
    }

    public function confirm_payment(){

      $bank = bank::all();
      $data['bank'] = $bank;
      return view('confirm_payment', $data);
    }


    public function add_subscribe(Request $request){

      $email = $request->input('email');

     // $check_mail = subscribe::find($email)->get();
      //subscribes



      $check_mail = DB::table('subscribes')
              ->where('email', $email)
              ->count();


     // dd($check_mail);


      if($check_mail != 0){

         return response()->json([
          'data' => [
            'status' => 1002
          ]
        ]);

      }else{


       $package = new subscribe();
       $package->email = $request['email'];
       $package->save();


       return response()->json([
          'data' => [
            'status' => 1001
          ]
        ]);


      }




    }


    public function sent_myproduct(Request $request){

      $product = $request->input('product');
      $email = $request->input('email');
      $tel = $request->input('tel');

      if($product == null || $email == null || $tel == null){
        return redirect(url('/?#sent_myproduct'))->with('sent_myproduct_is_null','คุณทำการเพิ่มอสังหา สำเร็จ');
      }



       $package = new getproduct();
       $package->product = $request['product'];
       $package->email = $request['email'];
       $package->phone = $request['tel'];
       $package->save();

       $the_id = $package->id;

       return redirect(url('/'))->with('add_success_product','คุณทำการเพิ่มอสังหา สำเร็จ');



    }


    public function buy_item(Request $request){

       $id = $request->input('product_id');
       $quantity = $request->input('quantity');

     $product = DB::select('select * from proshops where id='.$id);
     $cart = Session::get('cart');
     $cart[$product[0]->id] = array(
         "id" => $product[0]->id,
         "nama_product" => $product[0]->name_pro,
         "price" => $product[0]->price,
         "image" => $product[0]->image_pro,
         "qty" => $quantity,
         "shipping_price" => $product[0]->shipping_price,
     );

     Session::put('cart', $cart);


     return redirect(url('cart/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

     //  dd(Session::get('cart'));
       // return redirect(url('booking_cars'));
     }

    public function add_confirm_payment(Request $request){

      $image = $request->file('files');

      if($image == NULL){

        $this->validate($request, [
                'name_pay' => 'required',
                'phone_pay' => 'required',
                'no_pay' => 'required',
                'money_pay' => 'required',
                'bank' => 'required',
                'day_pay' => 'required',
                'time_pay' => 'required',
                'message_pay' => 'required'
            ]);


       $package = new pay_order();
       $package->name_pay = $request['name_pay'];
       $package->phone_pay = $request['phone_pay'];
       $package->no_pay = $request['no_pay'];
       $package->money_pay = $request['money_pay'];
       $package->bank = $request['bank'];
       $package->day_pay = $request['day_pay'];
       $package->time_pay = $request['time_pay'];
       $package->message_pay = $request['message_pay'];
       $package->save();

      }else{

        $image = $request->file('files');

        $this->validate($request, [
                'files' => 'required|max:8048',
                'name_pay' => 'required',
                'phone_pay' => 'required',
                'no_pay' => 'required',
                'money_pay' => 'required',
                'bank' => 'required',
                'day_pay' => 'required',
                'time_pay' => 'required',
                'message_pay' => 'required'
            ]);



            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/image/payment/');
        $img = Image::make($image->getRealPath());
        $img->resize(800, 533, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/image/payment/'.$input['imagename']);


            $package = new pay_order();
            $package->name_pay = $request['name_pay'];
            $package->phone_pay = $request['phone_pay'];
            $package->no_pay = $request['no_pay'];
            $package->money_pay = $request['money_pay'];
            $package->bank = $request['bank'];
            $package->day_pay = $request['day_pay'];
            $package->time_pay = $request['time_pay'];
            $package->message_pay = $request['message_pay'];
            $package->files_pay = $input['imagename'];
            $package->save();

      }

      $the_id = $package->id;
      $pay = pay_order::find($the_id);











      // send email
          $data_toview = array();
        //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
          date_default_timezone_set("Asia/Bangkok");
          $data_toview['name_pay'] = $pay->name_pay;
          $data_toview['phone_pay'] = $pay->phone_pay;
          $data_toview['no_pay'] = $pay->no_pay;
          $data_toview['money_pay'] = $pay->money_pay;
          $data_toview['bank'] = $pay->bank;
          $data_toview['day_pay'] = $pay->day_pay;
          $data_toview['time_pay'] = $pay->time_pay;
          $data_toview['message_pay'] = $pay->message_pay;
          $data_toview['files_pay'] = $pay->files_pay;


          $email_sender   = 'teeneejj@gmail.com';
          $email_pass     = 'qwer1234009';

      /*    $email_sender   = 'info@acmeinvestor.com';
          $email_pass     = 'Iaminfoacmeinvestor';  */
        //  $email_to       =  'siri@sirispace.com';

          //echo $admins[$idx]['email'];
          // Backup your default mailer
          $backup = \Mail::getSwiftMailer();

          try{

                      //https://accounts.google.com/DisplayUnlockCaptcha
                      // Setup your gmail mailer
                      $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                      $transport->setUsername($email_sender);
                      $transport->setPassword($email_pass);

                      // Any other mailer configuration stuff needed...
                      $gmail = new Swift_Mailer($transport);

                      // Set the mailer as gmail
                      \Mail::setSwiftMailer($gmail);



                      //dd($data['emailto']);
                      $data['sender'] = $email_sender;
                      //Sender dan Reply harus sama



                      Mail::send('mail.pay', $data_toview, function($message) use ($data)
                      {
                          $message->from($data['sender'], 'แจ้งการชำระเงิน Teeneejj');
                          $message->to($data['sender'])
                          ->replyTo($data['sender'], 'แจ้งการชำระเงิน Teeneejj.')
                          ->subject('แจ้งการชำระเงิน Teeneejj');

                          //echo 'Confirmation email after registration is completed.';
                      });



          }catch(\Swift_TransportException $e){
              $response = $e->getMessage() ;
              echo $response;

          }


          // Restore your original mailer
          Mail::setSwiftMailer($backup);
          // send email





      return redirect(url('success_payment/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }




    public function updateCart(Request $request)
    {
      $id = $request->input('id');
      $quantity = $request->input('quantity');
      //dd($id);
      $cart = Session::get('cart');

      if ($quantity > 0) {
            $cart[$id]['qty'] = $quantity;
        } else {
            unset($cart[$id]);
        }




      Session::put('cart', $cart);
    return redirect()->back();

    }



    public function deleteCart($id)
    {
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->back();
    }


   public function cart(){

     return view('cart');

   }

   public function success_payment(){

     return view('success_payment');

   }

   public function payment(){

     $provinces = DB::table('provinces')->get();
     $data['provinces'] = $provinces;
     return view('payment', $data);

   }







   public function add_order(Request $request){



     $this->validate($request, [
             'name_order' => 'required',
             'lastname_order' => 'required',
             'email_order' => 'required',
             'telephone_order' => 'required',
             'country_order' => 'required',
             'postal_code_order' => 'required',
             'street_order' => 'required',
             'total' => 'required',
             'shipping_price' => 'required',
             'policy_terms' => 'required'
         ]);

         $package = new order();
         $package->user_id = Auth::user()->id;
         $package->name_order = $request['name_order'];
         $package->lastname_order = $request['lastname_order'];
         $package->email_order = $request['email_order'];
         $package->telephone_order = $request['telephone_order'];
         $package->country_order = $request['country_order'];
         $package->postal_code_order = $request['postal_code_order'];
         $package->street_order = $request['street_order'];
         $package->total = $request['total'];
         $package->shipping_price = $request['shipping_price'];
         $package->save();

         $the_id = $package->id;

         $cart = Session::get('cart');

         foreach ($cart as $product_item){

           $package = new order_detail();
           $package->user_id = Auth::user()->id;
           $package->order_id = $the_id;
           $package->product_id = $product_item['id'];
           $package->product_image = $product_item['image'];
           $package->product_name = $product_item['nama_product'];
           $package->product_total = $product_item['qty'];
           $package->product_price = $product_item['price'];
           $package->save();
         }

         $bank = bank::all();


         $order = DB::table('orders')->select(
                'orders.*'
                )
                ->where('id', $the_id)
                ->first();

                $order_detail = DB::table('order_details')->select(
                       'order_details.*'
                       )
                       ->where('order_id', $the_id)
                       ->get();

                    //   dd($order_detail);

         $data['bank'] = $bank;
        $data['order'] = $order;
        $data['order_detai1'] = $order_detail;








        // send email
            $data_toview = array();
          //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
            date_default_timezone_set("Asia/Bangkok");
            $data_toview['data'] = $order;
            $data_toview['bank'] = $bank;
            $data_toview['order_detai1'] = $order_detail;
            $data_toview['datatime'] = date("d-m-Y H:i:s");

            $email_sender   = 'teeneejj@gmail.com';
            $email_pass     = 'qwer1234009';

        /*    $email_sender   = 'info@acmeinvestor.com';
            $email_pass     = 'Iaminfoacmeinvestor';  */
          //  $email_to       =  'siri@sirispace.com';
            $email_to       =  $request['email_order'];
            //echo $admins[$idx]['email'];
            // Backup your default mailer
            $backup = \Mail::getSwiftMailer();

            try{

                        //https://accounts.google.com/DisplayUnlockCaptcha
                        // Setup your gmail mailer
                        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                        $transport->setUsername($email_sender);
                        $transport->setPassword($email_pass);

                        // Any other mailer configuration stuff needed...
                        $gmail = new Swift_Mailer($transport);

                        // Set the mailer as gmail
                        \Mail::setSwiftMailer($gmail);

                        $data['emailto'] = $email_to;

                        //dd($data['emailto']);
                        $data['sender'] = $email_sender;
                        //Sender dan Reply harus sama

                        Mail::send('mail.index', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'คำสั่งซื้อสินค้าจาก Teeneejj');
                            $message->to($data['emailto'])
                            ->replyTo($data['emailto'], 'คำสั่งซื้อสินค้าจาก Teeneejj.')
                            ->subject('คำสั่งซื้อสินค้าจาก Teeneejj');

                            //echo 'Confirmation email after registration is completed.';
                        });

                        Mail::send('mail.index', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'คำสั่งซื้อสินค้าจาก Teeneejj');
                            $message->to($data['sender'])
                            ->replyTo($data['sender'], 'คำสั่งซื้อสินค้าจาก Teeneejj.')
                            ->subject('คำสั่งซื้อสินค้าจาก Teeneejj');

                            //echo 'Confirmation email after registration is completed.';
                        });



            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;

            }


            // Restore your original mailer
            Mail::setSwiftMailer($backup);
            // send email



        unset($cart);
        session()->forget('cart');

        return view('confirmation', $data);
   }












   public function product($id){

     //dd(Session::get('cart'));

     $cart = Session::get('cart');

     //dd($cart['2']);


     $gallery1 = DB::table('proshopimgs')->select(
            'proshopimgs.*'
            )
            ->where('product_id', $id)
            ->get();

            $home_image_count = DB::table('proshopimgs')->select(
                   'proshopimgs.*'
                   )
                   ->where('product_id', $id)
                   ->count();

     $data['home_image'] = $gallery1;
     $data['home_image_all'] = $gallery1;
     $data['home_image_count'] = $home_image_count;

     $product = DB::table('proshops')->select(
           'proshops.*',
           'proshops.id as idp',
           'proshops.detail as detailss',
           'category.*'
           )
           ->leftjoin('category', 'category.id',  'proshops.cat_id')
           ->where('proshops.status', 1)
           ->where('proshops.id', $id)
           ->first();

           $data['product'] = $product;
           return view('product', $data);
   }

   public function presentation(){

     $cat = DB::table('category')->select(
            'category.*'
            )
            ->whereBetween('id', [18, 22])
            ->where('id', '!=', 0)
            ->get();

    foreach ($cat as $obj1) {

      $options = DB::table('product')
            ->select(
            'product.*'
            )
            ->where('category_id', $obj1->id)
            ->count();
      $obj1->options = $options;
    }


    $cat2 = DB::table('category')->select(
           'category.*'
           )
           ->whereBetween('id', [23, 27])
           ->where('id', '!=', 0)
           ->get();

   foreach ($cat2 as $obj2) {

     $options = DB::table('product')
           ->select(
           'product.*'
           )
           ->where('category_id', $obj2->id)
           ->count();
     $obj2->options = $options;
   }


   $cat3 = DB::table('category')->select(
          'category.*'
          )
          ->whereBetween('id', [28, 32])
          ->where('id', '!=', 0)
          ->get();

  foreach ($cat3 as $obj3) {

    $options = DB::table('product')
          ->select(
          'product.*'
          )
          ->where('category_id', $obj3->id)
          ->count();
    $obj3->options = $options;
  }

     $data['category1'] = $cat;
     $data['category2'] = $cat2;
     $data['category3'] = $cat3;
     return view('presentation', $data);
   }

   public function map()
   {
     return view('map');
   }


   public function add_wishlist(Request $request)
   {

     if(isset(Auth::user()->id)){

       $check_w = DB::table('wishlists')->select(
              'wishlists.*'
              )
              ->where('product_id', $request->id)
              ->where('user_id', Auth::user()->id)
              ->count();


      if($check_w == 0){

        $package = new wishlist();
        $package->user_id = Auth::user()->id;
        $package->product_id = $request->id;
        $package->save();

        return response()->json([
          'status' => 1001,
        ]);

      }else{

        return response()->json([
          'status' => 1001,
        ]);

      }

     }else{

       return response()->json([
         'status' => 1002,
       ]);

     }



     //return view('map');
   }

   public function directions()
   {
     return view('directions');
   }

   public function article(){
     return view('article');
   }

   public function wishlist(){

     $wishlist_count = DB::table('wishlists')->select(
         'wishlists.*',
         'wishlists.id as idw'
         )
         ->where('wishlists.user_id', Auth::user()->id)
         ->count();

     $options = DB::table('wishlists')->select(
         'wishlists.*',
         'wishlists.id as idw',
         'product.*',
         'product.id as idp'
         )
         ->leftjoin('product', 'product.id', '=', 'wishlists.product_id')
         ->where('wishlists.user_id', Auth::user()->id)
         ->paginate(8);

         $data['wishlist_count'] = $wishlist_count;
         $data['options'] = $options;
         return view('wishlist', $data);

   }

   public function del_wishlist(Request $request){

     $obj = DB::table('wishlists')
      ->where('wishlists.id', $request->id)
      ->delete();

      return response()->json([
        'status' => 1001,
      ]);

   }

   public function history()
   {
     return view('history');
   }

   public function google(){
     return view('google');
   }

   public function contact_us()
   {
     return view('contact_us');
   }

   public function category_rate($id, $ratting){

     $rate1 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->where('rating', 1)
              ->count();
     $data['rate1'] = $rate1;

     $rate2 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->where('rating', 2)
              ->count();
     $data['rate2'] = $rate2;

     $rate3 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->where('rating', 3)
              ->count();
     $data['rate3'] = $rate3;

     $rate4 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->where('rating', 4)
              ->count();
     $data['rate4'] = $rate4;

     $rate5 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->where('rating', 5)
              ->count();
     $data['rate5'] = $rate5;


     $price1 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->whereBetween('startprice', [100, 200])
              ->count();
     $data['price1'] = $price1;

     $price2 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->whereBetween('startprice', [200, 500])
              ->count();
     $data['price2'] = $price2;

     $price3 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->whereBetween('startprice', [500, 1000])
              ->count();
     $data['price3'] = $price3;

     $price4 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->whereBetween('startprice', [1000, 2500])
              ->count();
     $data['price4'] = $price4;

     $price5 = DB::table('product')->select(
              'product.*'
              )
              ->where('category_id', $id)
              ->whereBetween('startprice', [2500, 20000000])
              ->count();
     $data['price5'] = $price5;

     $cat = DB::table('category')->select(
            'category.*'
            )
            ->where('id', $id)
            ->first();


            $options = DB::table('product')->select(
                'product.*'
                )
                ->where('category_id', $cat->id)
                ->where('rating', $ratting)
                ->orderBy('rating', 'desc')
                ->paginate(8);

                $shop = DB::table('product')->select(
                    'product.*'
                    )
                    ->where('category_id', $cat->id)
                    ->where('rating', $ratting)
                    ->get();

                    $shop_count = DB::table('product')->select(
                        'product.*'
                        )
                        ->where('category_id', $cat->id)
                        ->where('rating', $ratting)
                        ->count();

    $data['shop_count'] = $shop_count;
    $data['shop'] = $shop;
    $data['options'] = $options;
    $data['cat'] = $cat;
    //  dd($cat);

     return view('category', $data);
   }

   public function category_price($id, $price){

     if($price == 2){
       $s_price = 100;
       $e_price = 200;
     }else if($price == 3){
       $s_price = 200;
       $e_price = 500;
     }else if($price == 4){
       $s_price = 500;
       $e_price = 1000;
     }else if($price == 5){
       $s_price = 1000;
       $e_price = 2500;
     }else{
       $s_price = 2500;
       $e_price = 2500000;
     }

     //->whereBetween('startprice', [$s_price, $e_price])

     $cat = DB::table('category')->select(
            'category.*'
            )
            ->where('id', $id)
            ->first();


            $options = DB::table('product')->select(
                'product.*'
                )
                ->where('category_id', $cat->id)
                ->whereBetween('startprice', [$s_price, $e_price])
                ->orderBy('rating', 'desc')
                ->paginate(8);

                $shop = DB::table('product')->select(
                    'product.*'
                    )
                    ->where('category_id', $cat->id)
                    ->whereBetween('startprice', [$s_price, $e_price])
                    ->get();

                    $shop_count = DB::table('product')->select(
                        'product.*'
                        )
                        ->where('category_id', $cat->id)
                        ->whereBetween('startprice', [$s_price, $e_price])
                        ->count();

         $rate1 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 1)
                  ->count();
         $data['rate1'] = $rate1;

         $rate2 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 2)
                  ->count();
         $data['rate2'] = $rate2;

         $rate3 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 3)
                  ->count();
         $data['rate3'] = $rate3;

         $rate4 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 4)
                  ->count();
         $data['rate4'] = $rate4;

         $rate5 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 5)
                  ->count();
         $data['rate5'] = $rate5;


         //////////////////////////////////////////////



         $price1 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [100, 200])
                  ->count();
         $data['price1'] = $price1;

         $price2 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [200, 500])
                  ->count();
         $data['price2'] = $price2;

         $price3 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [500, 1000])
                  ->count();
         $data['price3'] = $price3;

         $price4 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [1000, 2500])
                  ->count();
         $data['price4'] = $price4;

         $price5 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [2500, 20000000])
                  ->count();
         $data['price5'] = $price5;


    $data['shop_count'] = $shop_count;
    $data['shop'] = $shop;
    $data['options'] = $options;
    $data['cat'] = $cat;
    //  dd($cat);

     return view('category', $data);

   }

   public function category($id){

     $cat = DB::table('category')->select(
            'category.*'
            )
            ->where('id', $id)
            ->first();


            $options = DB::table('product')->select(
                'product.*'
                )
                ->where('category_id', $cat->id)
                ->orderBy('rating', 'desc')
                ->paginate(8);

                $shop = DB::table('product')->select(
                    'product.*'
                    )
                    ->where('category_id', $cat->id)
                    ->get();

                    $shop_count = DB::table('product')->select(
                        'product.*'
                        )
                        ->where('category_id', $cat->id)
                        ->count();

         $rate1 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 1)
                  ->count();
         $data['rate1'] = $rate1;

         $rate2 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 2)
                  ->count();
         $data['rate2'] = $rate2;

         $rate3 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 3)
                  ->count();
         $data['rate3'] = $rate3;

         $rate4 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 4)
                  ->count();
         $data['rate4'] = $rate4;

         $rate5 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->where('rating', 5)
                  ->count();
         $data['rate5'] = $rate5;



         $price1 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [100, 200])
                  ->count();
         $data['price1'] = $price1;

         $price2 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [200, 500])
                  ->count();
         $data['price2'] = $price2;

         $price3 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [500, 1000])
                  ->count();
         $data['price3'] = $price3;

         $price4 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [1000, 2500])
                  ->count();
         $data['price4'] = $price4;

         $price5 = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('category_id', $cat->id)
                  ->whereBetween('startprice', [2500, 20000000])
                  ->count();
         $data['price5'] = $price5;


    $data['shop_count'] = $shop_count;
    $data['shop'] = $shop;
    $data['options'] = $options;
    $data['cat'] = $cat;
    //  dd($cat);

     return view('category', $data);

   }

   public function shop($id){

     $package = product::find($id);
     $package->view += 1;
     $package->save();

     $objs = DB::table('product')->select(
                'product.*',
                'product.id as id_p',
                'product.detail as details',
                'product.detail_en as details_en',
                'product.detail_cn as details_cn',
                'product.name as names',
                'category.*',
                'category.id as id_c',
                'category.name as name_c'
                )
        ->leftjoin('category', 'category.id',  'product.category_id')
        ->where('product.id', $id)
        ->first();

    $ran = DB::table('product')->where('category_id', $objs->id_c)->inRandomOrder()->limit(3)->get();

//dd($objs);

        $gallery1 = DB::table('product_image')->select(
               'product_image.*'
               )
               ->where('product_id', $id)
               ->get();

               $home_image_count = DB::table('product_image')->select(
                      'product_image.*'
                      )
                      ->where('product_id', $id)
                      ->count();

               $gallery2 = DB::table('product_image1')->select(
                      'product_image1.*'
                      )
                      ->where('product_id', $id)
                      ->get();

                      $cat = DB::table('category')->select(
                             'category.*'
                             )
                             ->where('id', '!=', 0)
                             ->get();

                             foreach ($cat as $obj1) {

                               $options = DB::table('product')
                                     ->select(
                                     'product.*'
                                     )
                                     ->where('category_id', $obj1->id)
                                     ->count();
                               $obj1->options = $options;
                             }
                            $data['ran'] = $ran;
                            $data['home_image_count'] = $home_image_count;
     $data['cat'] = $cat;
     $data['objs'] = $objs;
     $data['home_image'] = $gallery1;
     $data['home_image_all'] = $gallery1;
     $data['gallery2'] = $gallery2;
     return view('shop', $data);
   }


   public function search(Request $request){

     $search = $request->search;

     $data['search'] = $search;

     $get_user_count = DB::table('product')
          ->select(
          'product.*'
          )
          ->where('name', 'LIKE', "%$search%")
          ->orWhere('keyword2', 'LIKE', "%$search%")
          ->count();



      $options = DB::table('product')->select(
          'product.*'
          )
          ->where('name', 'LIKE', '%'.$search.'%')
          ->orWhere('keyword2', 'LIKE', '%'.$search.'%')
          ->paginate(8);

          $shop = DB::table('product')->select(
              'product.*'
              )
              ->where('name', 'LIKE', '%'.$search.'%')
              ->orWhere('keyword2', 'LIKE', '%'.$search.'%')
              ->get();

              $shop_count = DB::table('product')->select(
                  'product.*'
                  )
                  ->where('name', 'LIKE', '%'.$search.'%')
                  ->orWhere('keyword2', 'LIKE', '%'.$search.'%')
                  ->count();





    //dd($options);
      $options->appends($request->only('search'));

      $data['shop_count'] = $shop_count;
      $data['shop'] = $shop;
      $data['options'] = $options;
      $data['header'] = "ค้นหาสิ่งที่ต้องการ ใน ตลาดนัดสวนจตุจักร";


      //$options= compact('options');
      //dd($request->only('search'));
      //dd($options);
      return view('search', compact('options'))->with(['shop_count' => $shop_count, 'search' => $search]);
   }





   public function all_shop(){

     $shop = DB::table('product')->select(
           'product.*'
           )
           ->where('first', 1)
           ->orderBy('priority', 'asc')
           ->limit(12)
           ->get();

     $options = DB::table('product')->select(
         'product.*'
         )
         ->orderBy('rating', 'desc')
         ->paginate(16);

    $data['options'] = $options;
    $data['shop'] = $shop;
    $set_point = 0;
    $data['set_point'] = $set_point;
    return view('all_shop', $data);

   }









}
