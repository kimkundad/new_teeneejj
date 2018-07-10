<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category;
use App\Proshop;
use App\Proshopimg;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('proshops')->select(
              'proshops.*',
              'proshops.id as id_q',
              'category.*'
              )
              ->leftjoin('category', 'category.id',  'proshops.cat_id')
              ->get();

        $data['s'] = 1;
        $data['objs'] = $cat;
        $data['datahead'] = "สินค้าทั้งหมด";


        return view('admin.proshop.index', $data);
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
        //
        $data['method'] = "post";
        $data['url'] = url('admin/proshop');
        $data['datahead'] = "สร้างสินค้า ";
        return view('admin.proshop.create', $data);
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
             'name' => 'required',
             'cat_id' => 'required',
             'price' => 'required',
             'detail' => 'required',
             'rating' => 'required',
             'code_pro' => 'required',
             'shipping_price' => 'required',
             'stock' => 'required'
         ]);


         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/image/product/');
          $img = Image::make($image->getRealPath());
          $img->resize(800, 533, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/image/product/'.$input['imagename']);

       $package = new Proshop();
       $package->name_pro = $request['name'];
       $package->cat_id = $request['cat_id'];
       $package->price = $request['price'];
       $package->code_pro = $request['code_pro'];
       $package->detail = $request['detail'];
       $package->rating = $request['rating'];
       $package->stock = $request['stock'];
       $package->shipping_price = $request['shipping_price'];
       $package->image_pro = $input['imagename'];
       $package->save();

       $the_id = $package->id;

       return redirect(url('admin/proshop/'.$the_id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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
        $img_all = DB::table('proshopimgs')->select(
            'proshopimgs.*'
            )
            ->where('product_id', $id)
            ->get();
        $data['img_all'] = $img_all;

        $cat = DB::table('proshops')->select(
              'proshops.*',
              'proshops.id as id_q',
              'proshops.detail as detail_pro',
              'proshops.created_at as create',
              'category.*'
              )
              ->leftjoin('category', 'category.id',  'proshops.cat_id')
              ->where('proshops.id', $id)
              ->first();

              $category = category::all();
              $data['category'] = $category;

              $data['objs'] = $cat;
              $data['datahead'] = "แก้ไขข้อมูลสินค้า";
              $data['url'] = url('admin/proshop/'.$id);
              $data['method'] = "put";

              return view('admin.proshop.edit', $data);
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
               'name' => 'required',
               'cat_id' => 'required',
               'price' => 'required',
               'detail' => 'required',
               'rating' => 'required',
               'code_pro' => 'required',
               'shipping_price' => 'required',
               'stock' => 'required'
           ]);

           $package = Proshop::find($id);
           $package->name_pro = $request['name'];
           $package->cat_id = $request['cat_id'];
           $package->price = $request['price'];
           $package->code_pro = $request['code_pro'];
           $package->detail = $request['detail'];
           $package->rating = $request['rating'];
           $package->stock = $request['stock'];
           $package->shipping_price = $request['shipping_price'];
           $package->save();

        }else{

          $objs = DB::table('proshops')
          ->select(
             'proshops.*'
             )
          ->where('id', $id)
          ->first();

          $file_path = 'assets/image/product/'.$objs->image_pro;
          unlink($file_path);

          $this->validate($request, [
               'image' => 'required|max:8048',
               'name' => 'required',
               'cat_id' => 'required',
               'price' => 'required',
               'detail' => 'required',
               'rating' => 'required',
               'code_pro' => 'required',
               'shipping_price' => 'required',
               'stock' => 'required'
           ]);

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/image/product/');
      $img = Image::make($image->getRealPath());
      $img->resize(800, 533, function ($constraint) {
      $constraint->aspectRatio();
    })->save('assets/image/product/'.$input['imagename']);


           $package = Proshop::find($id);
           $package->name_pro = $request['name'];
           $package->cat_id = $request['cat_id'];
           $package->price = $request['price'];
           $package->code_pro = $request['code_pro'];
           $package->detail = $request['detail'];
           $package->rating = $request['rating'];
           $package->stock = $request['stock'];
           $package->shipping_price = $request['shipping_price'];
           $package->image_pro = $input['imagename'];
           $package->save();

        }

        return redirect(url('admin/proshop/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    public function add_gallery_shop_product(Request $request){

      $gallary = $request->file('product_image');
      $this->validate($request, [
           'product_image' => 'required|max:8048',
           'pro_id' => 'required'
       ]);

       if (sizeof($gallary) > 0) {
        for ($i = 0; $i < sizeof($gallary); $i++) {
          $path = 'assets/image/product/';
          $filename = time()."-".$gallary[$i]->getClientOriginalName();
          $gallary[$i]->move($path, $filename);
          $admins[] = [
              'image' => $filename,
              'product_id' => $request['pro_id']
          ];
        }
        Proshopimg::insert($admins);
      }

      return redirect(url('admin/proshop/'.$request['pro_id'].'/edit'))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

    }


    public function property_image_del_product(Request $request){


      $gallary = $request->get('product_image');
      $pro_id = $request['pro_id'];

      if (sizeof($gallary) > 0) {

       for ($i = 0; $i < sizeof($gallary); $i++) {

         $objs = DB::table('proshopimgs')
           ->where('id', $gallary[$i])
           ->first();

           $file_path = 'assets/image/product/'.$objs->image;
           unlink($file_path);

           DB::table('proshopimgs')->where('id', $objs->id)->delete();
       /*  $path = 'assets/cusimage/';
         $filename = time()."-".$gallary[$i]->getClientOriginalName();
         $gallary[$i]->move($path, $filename); */




       }


      }
      //dd($objs);
      return redirect(url('admin/proshop/'.$pro_id.'/edit'))->with('del_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

      }

    public function api_post_status_shop(Request $request){

    $user = Proshop::findOrFail($request->user_id);

              if($user->status == 1){
                  $user->status = 0;
              } else {
                  $user->status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

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
        $image_all =   $objs = DB::table('proshopimgs')
            ->select(
               'proshopimgs.*'
               )
            ->where('product_id', $id)
            ->get();

        foreach ($image_all as $user) {
        $file_path = 'assets/image/product/'.$user->image;
        unlink($file_path);
      }

        $objs = DB::table('proshops')
        ->select(
           'proshops.*'
           )
        ->where('id', $id)
        ->first();

        $file_path = 'assets/image/product/'.$objs->image_pro;
        unlink($file_path);
        $obj = Proshop::find($id);
        $obj->delete();
        return redirect(url('admin/proshop/'))->with('del_product','คุณทำการลบอสังหา สำเร็จ');
    }
}
