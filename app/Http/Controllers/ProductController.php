<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use Database;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function add_product(){

        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function all_brand_product(){
        $all_brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);

    }
    public function save_product(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_status'] = $request->product_status;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;

        $get_image = $request->file('product_images');
        if($get_image){
        $new_image = rand(0,99).'.'.$get_image->getClinetOriginalExtension();
        $get_image->move('public/upload/product',$new_image);
        $data['product_image'] = $new_image;
        DB::table('tbl_product')->insert($data);
        Session::put('message','successfully!');
        return redirect::to('add_product');
        }

        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','successfully!');
        return redirect::to('add_product');
    }
    public function unactive_brand_product($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status' =>0]);
        Session::put('message','Unactive successfully');
        return Redirect::to('all_brand_product');
    }
    public function active_brand_product($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status' =>1]);
        Session::put('message','Active successfully');
        return Redirect::to('all_brand_product');
    }
    public function edit_brand_product($brand_id){
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);

    }
    public function update_brand_product(Request $request ,$brand_id){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);
        Session::put('message','Update successfully');
        return Redirect::to('all_brand_product');
    }
    public function delete_brand_product($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
        Session::put('message','Delete successfully');
        return Redirect::to('all_brand_product');
    }
}
