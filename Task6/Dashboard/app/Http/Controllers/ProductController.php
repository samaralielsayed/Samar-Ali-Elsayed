<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){

        $products = DB::table('products')->get();
        return view('products.index',compact('products'));
       }
       public function create(){

        $brands = DB::table('brands')->select('id','name_en')->orderBy('name_en')->get();
        $subcategories = DB::table('subcategories')->select('id','name_en')->orderBy('name_en')->get();
        return view('products.create',compact('brands','subcategories'));
       }
       public function edit($id){

        $product = DB::table('products')->where('id',$id)->first();
        // validation
        $brands = DB::table('brands')->select('id','name_en')->orderBy('name_en')->get();
        $subcategories = DB::table('subcategories')->select('id','name_en')->orderBy('name_en')->get();
        return view('products.edit',compact('brands','subcategories','product'));
       }

       public function store( Request $request){

        $request->validate([
            'name_en'=>['required','string','max:255'],
            'name_ar'=>['required','string','max:255'],
            'price'=>['required','numeric','between:1,999999.99'],
            'quantity'=>['nullable','integer','between:1,999'],
            'code'=>['required','integer','between:1,999999','unique:products'],
            'status'=>['required','in:0,1'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'details_en'=>['required','string'],
            'details_ar'=>['required','string'],
            'image'=>['required','max:1000','mimes:jpg,png,jpeg']
        ]);

        $newImageName = $request->file('image')->hashName();
        $request->file('image')->move(public_path('images\products'),$newImageName);
        $data = $request->except('image','_token');
        $data['image'] =   $newImageName ;
        if(DB::table('products')->insert($data)){

            return redirect()->route('dashboard.products.index')->with('success','Product Created Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong');
        }

       }

       public function update( Request $request ,$id){

        $request->validate([
            'name_en'=>['required','string','max:255'],
            'name_ar'=>['required','string','max:255'],
            'price'=>['required','numeric','between:1,999999.99'],
            'quantity'=>['required','integer','between:1,999'],
            'code'=>['required','integer','between:1,999999','unique:products,code,'.$id],
            'status'=>['required','in:0,1'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'details_en'=>['required','string'],
            'details_ar'=>['required','string'],
            'image'=>['nullable','max:1000','mimes:jpg,png,jpeg']
        ]);

        $data = $request->except('image','_token','_method');
        if($request->hasFile('image')){
            $newImageName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('images\products'),$newImageName);
            $data['image'] =   $newImageName ;
            $photoName =DB :: table('products')->select('image')->where('id',$id)->first()->image;
            $photoPath =public_path("images\products\\{$photoName }");
            if(file_exists($photoPath)){
                unlink($photoPath);
            }

        }
        if(DB::table('products')->where('id',$id)->update($data)){

            return redirect()->route('dashboard.products.index')->with('success','Product Updated Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong');
        }

       }

       public function destory( $id){
            $photoName =DB :: table('products')->select('image')->where('id',$id)->first()->image;
            $photoPath =public_path("images\products\\{$photoName }");
            if(file_exists($photoPath)){
                unlink($photoPath);
            }
            DB :: table('products')->where('id',$id)->delete();
            return redirect()->route('dashboard.products.index')->with('success','Product Deleted Successfully');


       }

}
