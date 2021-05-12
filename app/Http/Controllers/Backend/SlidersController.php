<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use Image;
use File;


class SlidersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    $sliders = Slider::OrderBy('priority', 'asc')->get();
    return view('backend.pages.sliders.index', compact('sliders'));
  }


  public function store(Request $request)
  {

    $request->validate([
      'title'  => 'required',
      'image'  => 'required|image',
      'image'  => 'required',
      'button_link'  => 'nullable|url',
      'priority'  => 'required',
    ],
    [
      'title.required' => 'Please provide a slider Title',
      'image.required' => 'Please provide a slider Image',
      'image.image' => 'Please provide a slider Image',
      'button_link.url' => 'Please provide a slider Button Link',
      'priority.required' => 'Please provide a slider Priority',
    ]);

    $slider = new Slider();
    $slider -> title = $request->title;
    $slider -> button_text = $request->button_text;
    $slider -> button_link = $request->button_link;
    $slider -> priority = $request->priority;


    // slider Model insert image
    if ($request->image > 0) {
      $image = $request->file('image');
      $img = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/sliders/'.$img);
      Image::make($image)->save($location);
      $slider->image =  $img;
    }

    $slider -> save();

    session()->flash('success', 'A new Slider has added Successfully!!');
    return redirect()->route('admin.sliders');
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'title'  => 'required',
      'image'  => 'nullable|image',
      'button_link'  => 'nullable|url',
      'priority'  => 'required',
    ],
    [
      'title.required' => 'Please provide a slider Title',
      'image.image' => 'Please provide a slider Image',
      'button_link.url' => 'Please provide a valid url slider Button Link',
      'priority.required' => 'Please provide a slider Priority',
    ]);

    $slider = Slider::find($id);
    $slider -> title = $request->title;
    $slider -> button_text = $request->button_text;
    $slider -> button_link = $request->button_link;
    $slider -> priority = $request->priority;


    // ProducIMage Model insert image
    if ($request->image > 0) {
      // old slider image delete
      if (File::exists('images/sliders/'.$slider->image)) {
          File::delete('images/sliders/'.$slider->image);
      }


      $image = $request->file('image');
      $img = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/sliders/'.$img);
      Image::make($image)->save($location);
      $slider->image =  $img;
    }

    $slider -> save();

    session()->flash('success', 'A new Slider has update Successfully!!');
    return redirect()->route('admin.sliders');

  }

  public function delete($id)
  {
    $slider = Slider::find($id);
    if(!is_null($slider)){
      if (File::exists('images/sliders/'.$slider->image)) {
          File::delete('images/sliders/'.$slider->image);
      }
      $slider->delete();
    }
    session()->flash('success', 'Slider has deleted Successfully!!');
    return back();
  }
}
