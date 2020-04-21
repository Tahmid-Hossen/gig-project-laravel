<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
 
  public function AddCategory() {
    return view("pages.category");
  }

  public function StoreCategory(Request $request) {

    $validatedData = $request->validate([
      'name' => 'required|unique:categories|max:25|min:4',
      'slug' => 'required|unique:categories|max:25|min:4',
  ]);

    $data=array();
    $data['name']=$request->name;
    $data['slug']=$request->slug;
    $category=DB::table('categories')->insert($data);
    return redirect()->back()->with('success', 'category added successfully!');
  }
  public function AllCategory() {
    $category=DB::table('categories')->get();
    return view('pages.all_category',compact('category'));
    // return response()->json($category);
  }
  public function ViewCategory($id){
    $category=DB::table('categories')->where('id', $id)->first();
    return view('pages.view_category')->with('cat',$category);
  }

  public function DeleteCategory($id){
    $delete = DB::table('categories')->where('id', $id)->delete();
    return redirect()->back()->with('success', 'category delete successfully!');
  }

  public function EditCategory($id){
    $category=DB::table('categories')->where('id', $id)->first();
    return View('pages.edit_category',compact('category'));
  }

  public function UpdateCategory(Request $request, $id){
    $validatedData = $request->validate([
      'name' => 'required|max:25|min:4',
      'slug' => 'required|max:25|min:4',
  ]);

    $data=array();
    $data['name']=$request->name;
    $data['slug']=$request->slug;
    $category=DB::table('categories')->where('id', $id)->update($data);
    // return response()->json($category);
    return redirect()->route('all.category')->with('success', 'category updated successfully!');
  }

}
