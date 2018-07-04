<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\category;
use App\product;
use App\wishlist;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\TranslateClient;

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
     $data['shop_count'] = $shop_count;
     $data['set_point'] = $set_point;
     $data['shop'] = $shop;
     $data['category1'] = $cat;
     $data['category2'] = $cat2;
     $data['category3'] = $cat3;

       return view('welcome', $data);
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
     $data['cat'] = $cat;
     $data['objs'] = $objs;
     $data['gallery1'] = $gallery1;
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

    if($get_user_count > 0){

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

    }else{
      $shop_count = 0;
      $options = null;
      $shop = null;
    }

    //dd($options);

      $data['shop_count'] = $shop_count;
      $data['shop'] = $shop;
      $data['options'] = $options;
      $data['header'] = "ค้นหาสิ่งที่ต้องการ ใน ตลาดนัดสวนจตุจักร";
      $options->appends($request->only('search'));
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
