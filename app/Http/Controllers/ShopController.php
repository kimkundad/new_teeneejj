<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Auth;
use App\category;
use App\product;
use App\gallery;
use App\gallery2;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('product')->select(
              'product.*',
              'product.id as id_q',
              'product.name as name_q',
              'category.*'
              )
              ->leftjoin('category', 'category.id',  'product.category_id')
              ->paginate(15);

        $data['s'] = 1;
        $data['objs'] = $cat;
        $data['datahead'] = "ร้านค้าทั้งหมด";


        return view('admin.shop.index', $data);
    }

    public function search_shop(Request $request){

      $this->validate($request, [
        'search' => 'required'
      ]);

      $search = $request->get('search');


      $cat = DB::table('product')->select(
            'product.*',
            'product.id as id_q',
            'product.name as name_q',
            'category.*'
            )
            ->leftjoin('category', 'category.id',  'product.category_id')
            ->where('product.name', 'like', "%$search%")
            ->get();

      $data['s'] = 1;
      $data['objs'] = $cat;
      $data['datahead'] = "ร้านค้าทั้งหมด";
      $data['search'] = $search;

      return view('admin.shop.index_search', $data);

    }



    public function first_shop(){

      $cat = DB::table('product')->select(
            'product.*',
            'product.id as id_q',
            'product.name as name_q',
            'category.*'
            )
            ->leftjoin('category', 'category.id',  'product.category_id')
            ->where('product.first', 1)
            ->get();

      $data['s'] = 1;
      $data['objs'] = $cat;
      $data['datahead'] = "ร้านค้าทั้งหมด";


      return view('admin.shop.first_shop', $data);

    }

    public function add_sort_shop(Request $request){

      $input_sort = $request['input_sort'];
      $id = $request['ids'];


      $package = product::find($id);
      $package->priority = $input_sort;
      $package->save();


      return Response::json([
          'status' => 1001
      ], 200);

    }

    public function post_status_order(Request $request){

    $user = product::findOrFail($request->user_id);

              if($user->first == 1){
                  $user->first = 0;
              } else {
                  $user->first = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
      $category = category::all();
      $data['category'] = $category;
      $data['method'] = "post";
      $data['url'] = url('admin/shop');
      $data['datahead'] = "สร้าง ร้านค้าใหม่ ";
      return view('admin.shop.create', $data);
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
        $image = $request->file('image');

        $this->validate($request, [
           'image' => 'required|max:8048',
           'name_q' => 'required',
           'cat_id' => 'required',
           'phone' => 'required',
           'startprice' => 'required',
           'endprice' => 'required',
           'rating' => 'required',
           'keyword' => 'required',
           'details_th' => 'required',
           'details_en' => 'required',
           'details_cn' => 'required',
           'keyword2' => 'required',
           'lat' => 'required',
           'lng' => 'required'
       ]);


       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/image/cusimage/');
        $img = Image::make($image->getRealPath());
        $img->resize(800, 533, function ($constraint) {
        $constraint->aspectRatio();
        })->save('assets/image/cusimage/'.$input['imagename']);


        $package = new product();
        $package->name = $request['name_q'];
        $package->category_id = $request['cat_id'];
        $package->detail = $request['details_th'];
        $package->keyword = $request['keyword'];
        $package->rating = $request['rating'];
        $package->phone = $request['phone'];
        $package->facebook = $request['facebook'];
        $package->instagram = $request['instagram'];
        $package->line_id = $request['line_id'];
        $package->email = $request['email'];
        $package->youtube = $request['youtube'];
        $package->website = $request['website'];
        $package->startprice = $request['startprice'];
        $package->endprice = $request['endprice'];
        $package->keyword2 = $request['keyword2'];
        $package->latitude = $request['lat'];
        $package->longitude = $request['lng'];
        $package->detail_en = $request['details_en'];
        $package->detail_cn = $request['details_cn'];
        $package->image = $input['imagename'];
        $package->save();


        $the_id = $package->id;

        return redirect(url('admin/shop/'.$the_id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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
        $img_all = DB::table('product_image')->select(
            'product_image.*'
            )
            ->where('product_id', $id)
            ->get();
        $data['img_all'] = $img_all;

        $img_all_1 = DB::table('product_image1')->select(
            'product_image1.*'
            )
            ->where('product_id', $id)
            ->get();
        $data['img_all_1'] = $img_all_1;

        $cat = DB::table('product')->select(
              'product.*',
              'product.id as id_q',
              'product.name as name_q',
              'product.detail as details_th',
              'product.detail_en as details_en',
              'product.detail_cn as details_cn',
              'product.image as image_shop',
              'category.*',
              'category.id as idc'
              )
              ->leftjoin('category', 'category.id',  'product.category_id')
              ->where('product.id', $id)
              ->first();

        $category = category::all();
        $data['category'] = $category;
        $data['s'] = 1;
        $data['url'] = url('admin/shop/'.$id);
        $data['method'] = "put";
        $data['objs'] = $cat;
        $data['datahead'] = "แก้ไขร้านค้า";


        return view('admin.shop.edit', $data);
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

        $image = $request->file('image');

        if($image == NULL){

          $this->validate($request, [
             'name_q' => 'required',
             'cat_id' => 'required',
             'phone' => 'required',
             'facebook' => 'required',
             'instagram' => 'required',
             'line_id' => 'required',
             'email' => 'required',
             'youtube' => 'required',
             'website' => 'required',
             'startprice' => 'required',
             'endprice' => 'required',
             'rating' => 'required',
             'keyword' => 'required',
             'details_th' => 'required',
             'details_en' => 'required',
             'details_cn' => 'required',
             'keyword2' => 'required',
             'lat' => 'required',
             'lng' => 'required'
         ]);


      $package = product::find($id);
      $package->name = $request['name_q'];
      $package->category_id = $request['cat_id'];
      $package->detail = $request['details_th'];
      $package->keyword = $request['keyword'];
      $package->rating = $request['rating'];
      $package->phone = $request['phone'];
      $package->facebook = $request['facebook'];
      $package->instagram = $request['instagram'];
      $package->line_id = $request['line_id'];
      $package->email = $request['email'];
      $package->youtube = $request['youtube'];
      $package->website = $request['website'];
      $package->startprice = $request['startprice'];
      $package->endprice = $request['endprice'];
      $package->keyword2 = $request['keyword2'];
      $package->latitude = $request['lat'];
      $package->longitude = $request['lng'];
      $package->detail_en = $request['details_en'];
      $package->detail_cn = $request['details_cn'];
      $package->save();

        }else{

          $objs = DB::table('product')
          ->select(
             'product.*'
             )
          ->where('id', $id)
          ->first();

          if(isset($objs->image)){
            $file_path = 'assets/image/cusimage/'.$objs->image;
            unlink($file_path);
          }



          $this->validate($request, [
            'image' => 'required|max:8048',
             'name_q' => 'required',
             'cat_id' => 'required',
             'phone' => 'required',
             'facebook' => 'required',
             'instagram' => 'required',
             'line_id' => 'required',
             'email' => 'required',
             'youtube' => 'required',
             'website' => 'required',
             'startprice' => 'required',
             'endprice' => 'required',
             'rating' => 'required',
             'keyword' => 'required',
             'details_th' => 'required',
             'details_en' => 'required',
             'details_cn' => 'required',
             'keyword2' => 'required',
             'lat' => 'required',
             'lng' => 'required'
         ]);


         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/image/cusimage/');
          $img = Image::make($image->getRealPath());
          $img->resize(800, 533, function ($constraint) {
          $constraint->aspectRatio();
          })->save('assets/image/cusimage/'.$input['imagename']);

          $package = product::find($id);
          $package->name = $request['name_q'];
          $package->category_id = $request['cat_id'];
          $package->detail = $request['details_th'];
          $package->keyword = $request['keyword'];
          $package->rating = $request['rating'];
          $package->phone = $request['phone'];
          $package->facebook = $request['facebook'];
          $package->instagram = $request['instagram'];
          $package->line_id = $request['line_id'];
          $package->email = $request['email'];
          $package->youtube = $request['youtube'];
          $package->website = $request['website'];
          $package->startprice = $request['startprice'];
          $package->endprice = $request['endprice'];
          $package->keyword2 = $request['keyword2'];
          $package->latitude = $request['lat'];
          $package->longitude = $request['lng'];
          $package->detail_en = $request['details_en'];
          $package->detail_cn = $request['details_cn'];
          $package->image = $input['imagename'];
          $package->save();

        }


          return redirect(url('admin/shop/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function add_gallery_shop(Request $request){
        //
      //  dd('55555');

        $gallary = $request->file('product_image');
        $this->validate($request, [
             'product_image' => 'required|max:8048',
             'pro_id' => 'required'
         ]);

         if (sizeof($gallary) > 0) {
          for ($i = 0; $i < sizeof($gallary); $i++) {
            $path = 'assets/image/cusimage/';
            $filename = time()."-".$gallary[$i]->getClientOriginalName();
            $gallary[$i]->move($path, $filename);
            $admins[] = [
                'image' => $filename,
                'product_id' => $request['pro_id']
            ];
          }
          gallery::insert($admins);
        }

        return redirect(url('admin/shop/'.$request['pro_id'].'/edit'))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');
    }


    public function add_gallery_shop_2(Request $request){
        //
      //  dd('55555');

        $gallary = $request->file('product_image');
        $this->validate($request, [
             'product_image' => 'required|max:8048',
             'pro_id' => 'required'
         ]);

         if (sizeof($gallary) > 0) {
          for ($i = 0; $i < sizeof($gallary); $i++) {
            $path = 'assets/image/cusimage/';
            $filename = time()."-".$gallary[$i]->getClientOriginalName();
            $gallary[$i]->move($path, $filename);
            $admins[] = [
                'image' => $filename,
                'product_id' => $request['pro_id']
            ];
          }
          gallery2::insert($admins);
        }

        return redirect(url('admin/shop/'.$request['pro_id'].'/edit'))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');
    }


    public function property_image_del(Request $request){


      $gallary = $request->get('product_image');
      $pro_id = $request['pro_id'];

      if (sizeof($gallary) > 0) {

       for ($i = 0; $i < sizeof($gallary); $i++) {

         $objs = DB::table('product_image')
           ->where('id', $gallary[$i])
           ->first();

           $file_path = 'assets/image/cusimage/'.$objs->image;
           unlink($file_path);

           DB::table('product_image')->where('id', $objs->id)->delete();
       /*  $path = 'assets/cusimage/';
         $filename = time()."-".$gallary[$i]->getClientOriginalName();
         $gallary[$i]->move($path, $filename); */




       }


      }
      //dd($objs);
      return redirect(url('admin/shop/'.$pro_id.'/edit'))->with('del_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

      }


      public function property_image_del_2(Request $request){


        $gallary = $request->get('product_image');
        $pro_id = $request['pro_id'];

        if (sizeof($gallary) > 0) {

         for ($i = 0; $i < sizeof($gallary); $i++) {

           $objs = DB::table('product_image1')
             ->where('id', $gallary[$i])
             ->first();

             $file_path = 'assets/image/cusimage/'.$objs->image;
             unlink($file_path);

             DB::table('product_image1')->where('id', $objs->id)->delete();
         /*  $path = 'assets/cusimage/';
           $filename = time()."-".$gallary[$i]->getClientOriginalName();
           $gallary[$i]->move($path, $filename); */




         }


        }
        //dd($objs);
        return redirect(url('admin/shop/'.$pro_id.'/edit'))->with('del_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

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
}
