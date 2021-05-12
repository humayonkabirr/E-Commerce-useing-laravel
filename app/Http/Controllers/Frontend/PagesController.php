<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Models\Product;

class PagesController extends Controller
{
    public function index()
    {
      $sliders = Slider::OrderBy('priority', 'asc')->get();
      $products = Product::OrderBy('id', 'desc')->paginate(9);
      return view('frontend.pages.index', compact('products', 'sliders'));
    }
    public function contact()
    {
      return view('frontend.pages.contact');
    }

    public function search(Request $request)
    {
      $search = $request->search;
      $products = Product::orWhere('title', 'like', '%'.$search.'%')
      ->orWhere('description', 'like', '%'.$search.'%')
      ->orWhere('slug', 'like', '%'.$search.'%')
      ->orWhere('price', 'like', '%'.$search.'%')
      ->orWhere('quantity', 'like', '%'.$search.'%')
      ->OrderBy('id', 'desc')->paginate(9);
      return view('frontend.pages.product.search', compact('search','products'));
    }

}
