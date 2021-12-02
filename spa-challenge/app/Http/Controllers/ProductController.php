<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        // dd($product);
        return response()->json([
            'status' => true,
            'data' => $product,
        ]);
    } 
    
    public function store(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'product_name' => 'required',
                // 'product_image' => 'required',
                'harga_barang' => 'required',
            ]);

            if ($validator->fails()) {
                return response([
                    'status' => false,
                    'data' => $validator->errors()
                ]);
            }

            $product = new Product();
            $product->id = $product->id;
            $product->product_name = $request->get('product_name');
            // $product->product_image = $request->get('product_image');
            $product->harga_barang = $request->get('harga_barang');
            $product->save();

            return response()->json([
                'status' => true,
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'data' => 'Data is invalid: ' .$e
            ]);
        }
    }
    
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'status' => true,
            'data' => 'data berhasil di delete'
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if(!$product) return response()->json([
            'status' => false,
            'data' => 'invalid id'
        ]);

        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product_name = $request->get('product_name');
        $harga_barang = $request->get('harga_barang');

        $product = Product::find($id);

        if (!$product) return response()->json([
            'status' => false,
            'data' => 'invalid id'
        ]);

        $product->product_name = $product_name;
        $product->harga_barang = $harga_barang;
        $product->save();

        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }
}
