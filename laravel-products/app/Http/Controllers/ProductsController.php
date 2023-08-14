<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index()
  {
    
    // HTTP call to external API
    $response = Http::withOptions(['verify' => false])->get('https://dummyjson.com/products');
        dd($response->json());
        $products = $response->json('products');

        // Convert object array to array of arrays
        $products_array = json_decode(json_encode($products), true); 
        
        Product::insert($products_array);

    // Fetch from database and return
    return response()->json(Product::all());  
  }
}
