<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
  public function WritePost(){
    $category = DB::table('categories')->get();
    return view('pages.create-blog',compact('category'));
  }
   
  public function StorePost(Request $request){
    $validatedData = $request->validate([
      'title' => 'required|max:250',
      'details' => 'required',
      'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
  ]);

  $data = array();
  $data['title']=$request->title;
  $data['category_id']=$request->category_id;
  $data['details']=$request->details;
  $image = $request->file('image');
  if($image){
    $image_name = hexdec(uniqid());
    $ext = strtolower($image->getClientOriginalExtension());
    $image_full_name = $image_name.','.$ext;
    $upload_path = 'public/frontend/image/';
    $image_url = $upload_path.$image_full_name;
    $success = $image->move($upload_path,$image_full_name);
    $data['image'] = $image_url;
    DB::table('posts')->insert($data);
    return Redirect()->back()->with('success', 'image inserted successfully!');
    


  } else {
    DB::table('posts')->insert($data);
    return Redirect()->back()->with('success', 'post inserted successfully!');

  }


  }

  public function AllPost(){
      // $post = DB::table('posts')->get();
      $post = DB::table('posts')
          ->join('categories','posts.category_id','categories.id','categories.slug')
          ->select('posts.*','categories.name')
          ->get();
      return view('pages.allpost',compact('post'));
  }
  public function ViewPost($id) {
    $post = DB::table('posts')
      ->join('categories','posts.category_id','categories.id','categories.slug')
      ->select('posts.*','categories.name')
      ->where('posts.id', $id)
      ->first();
      return view("pages.viewpost",compact('post'));
  }

  public function EditPost($id) {
    $category = DB::table('categories')->get();
    $post = DB::table('posts')->where('id', $id)->first();
    return view('pages.editpost',compact('category','post'));
  }

  public function UpdatePost(Request $request,$id) {
    $validatedData = $request->validate([
      'title' => 'required|max:250',
      'details' => 'required',
      'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
  ]);
  $data = array();
  $data['title']=$request->title;
  $data['category_id']=$request->category_id;
  $data['details']=$request->details;
  $image = $request->file('image');
  if($image){
    $image_name = hexdec(uniqid());
    $ext = strtolower($image->getClientOriginalExtension());
    $image_full_name = $image_name.','.$ext;
    $upload_path = 'public/frontend/image/';
    $image_url = $upload_path.$image_full_name;
    $success = $image->move($upload_path,$image_full_name);
    $data['image'] = $image_url;
    unlink($request->old_photo);
    DB::table('posts')->where('id',$id)->update($data);
    return Redirect()->route('all.post')->with('success', 'image updated successfully!');
    


  } else {
    $data['image'] = $request->old_photo;
    DB::table('posts')->where('id',$id)->update($data);
    return Redirect()->route('all.post')->with('success', 'post updated successfully!');

  }

  }

  public function DeletePost($id){
     $delete = DB::table('posts')->where('id',$id)->delete();
     return redirect()->back()->with('success', 'post delete successfully!');
  }

}
