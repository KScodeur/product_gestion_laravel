<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $search = $request['search'];
        if($search !=""){
            $products = Product::where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('category', 'LIKE', '%'.$search.'%')
                        ->get();
        }else{
            $products = Product::orderby('created_at',"desc")->get();
        }
        return view('products.index',compact('products', 'search'));

    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){

        //pour la validation
        $request->validate([
            'name'=> 'required'
        ]);

        $product = new Product;

       /*$file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);*/

        $product->name = $request-> name;
        $product->description = $request-> description;
        $product->category = $request-> category;
        $product->quantity = $request-> quantity;
        $product->price = $request-> price;
        $product->image = $request-> image;

        $product->save();
        return redirect('products')->with('success, product added succesfully');
    }

    public function edit($id){
        $products = Product::find($id);
        return view("products.edit", compact('products'));
    }
    public function update(Request $request, $id){
        $products = Product::find($id);
        $input =$request->all();
        $products->update($input);
        return redirect('products')->with("success","products update successfully");
    }
    public function delete($id){
        $product= Product::find($id);
        if($product !=null){
            $product->delete();
            return back()->with("success", "product delected successfully");
        }
    }

}
