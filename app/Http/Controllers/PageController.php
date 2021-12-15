<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(){
        return view('index');
    }

    public function home(){
        if(isset(Auth::user()->id)){
            $data = Post::where('user_id', Auth::user()->id)->paginate(10);
            return view('home',compact('data'));
        }else{
            return redirect()->route('index');
        }

    }









}
