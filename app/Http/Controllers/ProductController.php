<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){

        $products = Product::orderBy('id','DESC')->paginate(8);
        return view('product',[
            'products' => $products
        ]);
    }

    public function create(){

        return view('create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:4',
            'price' => 'required',
            'qty'   => 'required'
        ]);

        if($validator->passes()){
            $product = new Product();
            $product->name =  $request->input('name');
            $product->description = $request->input('desc');
            $product->price   = $request->price;
            $product->qty     = $request->qty;

            $product->save();

            return response()->json([
                'status' => 200,
                'message' => 'Product created successfully'
            ]);
        }else{
            return response([
                "status" => 500,
                "message" => "Please config errors",
                "errors"  => $validator->errors(),
            ]);
        }

    }

    public function edit(){

        return view('edit');
    }
}
