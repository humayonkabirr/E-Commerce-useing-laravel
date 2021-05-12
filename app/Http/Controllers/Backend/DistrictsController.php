<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Models\Division;
use  App\Models\District;
use Image;


class DistrictsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  
    public function index()
    {
      $districts = District::OrderBy('name', 'asc')->get();
      return view('backend.pages.districts.index', compact('districts'));
    }

    public function create()
    {
       $divisions = Division::OrderBy('name', 'asc')->get();
      return view('backend.pages.districts.create', compact('divisions'));
    }

    public function edit($id)
    {
      $divisions = Division::OrderBy('priority', 'asc')->get();
      $district = District::find($id);
      if(!is_null($district)){
        return view('backend.pages.districts.edit', compact('district', 'divisions'));
      }else {
        return resirect()->route('admin.districts');
      }
    }

    public function store(Request $request)
    {

      $request->validate([
        'name'  => 'required',
        'division_id'  => 'required',
      ],
      [
        'name.required' => 'Please provide a division Name',
        'division_id.required' => 'Please provide a division for the district',
      ]);

      $district = new District();
      $district -> name = $request->name;
      $district -> division_id = $request->division_id;
      $district -> save();

      session()->flash('success', 'A new District has added Successfully!!');
      return redirect()->route('admin.districts');
    }

    public function update(Request $request, $id)
    {

      $request->validate([
        'name'  =>'required',
        'division_id'  =>'required',
      ],
      [
        'name.required' => 'Please provide a division Name',
        'priority.required' => 'Please provide a division Priority',
      ]);


      $district = District::find($id);
      $district -> name = $request->name;
      $district -> division_id = $request->division_id;
      $district -> save();

      session()->flash('success', 'A new District has update Successfully!!');
      return redirect()->route('admin.districts');

    }

    public function delete($id)
    {
      $district = Division::find($id);
      if(!is_null($district)){
        $district->delete();
      }
      session()->flash('success', 'District has deleted Successfully!!');
      return back();

    }
}
