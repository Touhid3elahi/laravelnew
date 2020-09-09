<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function addcategory()
    {
        return view('post.add_category');
    }

    public function storecategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:5',
            'slug' => 'required|unique:categories|max:25|min:5',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        if ($category) {
            $notification=array(
                'message'=>'Successfully Category Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function allcategory()
    {
        $category=DB::table('categories')->get();
        return view('post.all_category',compact('category'));
    }

    public function viewcategory($id)
    {
         $category=DB::table('categories')->where('id',$id)->first();
        return view('post.categoryview',compact('category'));
        // return view('post.categoryview')->with('category',$category);
    }

    public function deletecategory($id)
    {
        $delete=DB::table('categories')->where('id',$id)->delete();

            $notification=array(
                'message'=>'Successfully Category deleted',
                'alert-type'=>'success');
        return Redirect()->back()->with($notification);

    }

    public function editcategory($id)
    {
           $category=DB::table('categories')->where('id',$id)->first();
            return view('post.editcategory',compact('category'));
      }

    public function updatecategory(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:5',
            'slug' => 'required|max:25|min:5',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id',$id)->update($data);
        if ($category) {
            $notification=array(
                'message'=>'Successfully Category update',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->route('all.category')->with($notification);
        }
      }
}
