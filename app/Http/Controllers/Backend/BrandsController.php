<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use Image;
use File;

class BrandsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index()
    {
      $brands = Brand::OrderBy('id', 'desc')->get();
      return view('backend.pages.brands.index', compact('brands'));
    }

    public function create()
    {
      return view('backend.pages.brands.create');
    }

    public function store(Request $request)
    {
       $this->validate($request, [
        'name' => 'required',
        'image' => 'nullable|image',
      ],
    [
      'name.required' => 'Please provide a Brand Name',
      'image.image' => 'Please provide a Brand Image',
    ]);

    $Brand = new Brand();
    $Brand->name = $request->name;
    $Brand->description = $request->description;

    // ProducIMage Model insert image
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $img = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/brands/'.$img);
      Image::make($image)->save($location);
      $Brand->image =  $img;
    }
    $Brand -> save();

    session()->flash('success', 'A new Brand has added Successfully!!!');
    return redirect()->route('admin.brands');
    }

    public function edit($id)
    {
      $brand = Brand::FindOrFail($id);
      if(!is_null($brand)){
        return view('backend.pages.brands.edit', compact('brand'));
      } else {
        return redirect()->route('amdin.brands');
      }
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, [
        'name' => 'required',
        'image' => 'nullable|image',
      ],
    [
      'name.required' => 'Please provide a Brand Name',
      'image.image' => 'Please provide a Brand Image',
    ]);

    $Brand = Brand::find($id);
    $Brand->name = $request->name;
    $Brand->description = $request->description;

    // ProducIMage Model insert image
    if ($request->hasFile('image')) {
      if (File::exists('images/brands/'.$Brand->image)) {
        File::delete('images/brands/'.$Brand->image);
      }
      $image = $request->file('image');
      $img = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/brands/'.$img);
      Image::make($image)->save($location);
      $Brand->image =  $img;
    }
    $Brand -> save();

    session()->flash('success', 'A new Brand has Updated Successfully!!!');
    return redirect()->route('admin.brands');
    }

    public function delete($id)
    {
      $Brand = Brand::find($id);
      if(!is_null($Brand)){
        //Delete Brand images
        if (File::exists('images/brands/'.$Brand->image)) {
          File::delete('images/brands/'.$Brand->image);
        }

        $Brand->delete();
      }
      session()->flash('success', 'Brand has deleted Successfully!!');
      return back();

    }


}
