<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class pagecontroller extends Controller
{
    public function about()
    {
    	return view('pages.about');
    }
public function contact()
    {
        return view('contact');
    }
    public function index()
    {
        $post=DB::table('posts')->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name','categories.slug')->paginate(3);
        return view('pages.index',compact('post'));
    }
}
