<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function writepost()
    {
        $category=DB::table('categories')->get();
    	return view('post.writepost',compact('category'));
    }

    public function storepost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:125',
            'details' => 'required|max:250',
            'image' => 'required | mimes:jpeg,jpg,png,PNG',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
         if ($image)
             {
             $image_name=hexdec(uniqid());
             $ext=strtolower($image->getClientOriginalExtension());
             $image_full_name=$image_name.'.'.$ext;
             $upload_path='public/frontend/image/';
             $image_url=$upload_path.$image_full_name;
             $success=$image->move($upload_path,$image_full_name);
             $data['image']=$image_url;
             DB::table('posts')->insert($data);
             $notification=array(
                 'messege'=>'Successfully Post Inserted',
                 'alert-type'=>'success'
             );
             return Redirect()->back()->with($notification);
         }else{
          DB::table('posts')->insert($data);
          $notification=array('message'=>'successfully inserted',
              'alart type'=>'success'
          );
             return Redirect()->back()->with($notification);
         }
    }

    public function allpost()
    {
        $post=DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->get();
        return view('post.allpost',compact('post'));
    }

    public function viewpost($id)
    {
        $post=DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->where('posts.id',$id)
            ->first();
        return view('post.viewpost',compact('post'));
    }

    public function editpost($id)
    {
        $category=DB::table('categories')->get();
        $post=DB::table('posts')->where('id',$id)->first();
        return view('post.editpost',compact('category','post'));
    }

    public function updatepost(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:125',
            'details' => 'required|max:250',
            'image' => 'mimes:jpeg,jpg,png,PNG',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image)
        {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_image);
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }else{
            $data['image']=$request->old_image;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array('message'=>'successfully inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
    }

    public function deletepost($id)
    {
        $post=DB::table('post')->where('id',$id)->first();
        $delete=DB::table('posts')->where('id',$id)->delete();
        if(delete){
            unlink($image);
            $notification=array(
                'message'=>'successful to delete',
                'alert-type'=>'success'
                );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'not deleted',
                'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }
}
