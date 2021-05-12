<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Models\Division;
use  App\Models\District;
use Image;


class DivisionsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
    public function index()
    {
      $divisions = Division::OrderBy('priority', 'asc')->get();
      return view('backend.pages.divisions.index', compact('divisions'));
    }

    public function create()
    {
      return view('backend.pages.divisions.create');
    }

    public function edit($id)
    {
      $division = Division::find($id);
      if(!is_null($division)){
        return view('backend.pages.divisions.edit', compact('division'));
      }else {
        return resirect()->route('admin.divisions');
      }
    }

    public function store(Request $request)
    {

      $request->validate([
        'name'  => 'required',
        'priority'  => 'required',
      ],
      [
        'name.required' => 'Please provide a division Name',
        'priority.required' => 'Please provide a division Priority',
      ]);


      $division = new Division();
      $division -> name = $request->name;
      $division -> priority = $request->priority;
      $division -> save();

      session()->flash('success', 'A new Division has added Successfully!!');
      return redirect()->route('admin.divisions');
    }

    public function update(Request $request, $id)
    {

      $request->validate([
        'name'  =>'required',
        'priority'  =>'required',
      ],
      [
        'name.required' => 'Please provide a division Name',
        'priority.required' => 'Please provide a division Priority',
      ]);


      $division = Division::find($id);
      $division -> name = $request->name;
      $division -> priority = $request->priority;
      $division -> save();

      session()->flash('success', 'A new Division has update Successfully!!');
      return redirect()->route('admin.divisions');

    }

    public function delete($id)
    {
      $division = Division::find($id);
      if(!is_null($division)){
        $districts = District::where('division_id', $division->id)->get();
        foreach ($districts as $district) {
          $district->delete();
        }
        $division->delete();
      }
      session()->flash('success', 'Division has deleted Successfully!!');
      return back();
    }
}
