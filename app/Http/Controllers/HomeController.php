<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function del_user($id){

        
        



        $posts = Post::where('user_id',$id);
        foreach ($posts as $post) {
            dd($post);
            Comment::where('post_id',$post->id)->delete();
        }

        $posts->delete();

        Comment::where('user_id',$id)->delete();

        User::where('id',$id)->delete();

        return redirect()->route('index');

    }

    public function edit($id){
        $data = User::where('id',$id)->first();
        // dd($data);
        return view('upload-profile')->with('data',$data);
    }

    public function update(Request $request, $id){

        $getUser = User::where('id',$id)->first();

        if ($image = $request->file('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }

        $getUser->photo = $profileImage;
        $getUser->name = $getUser->name;
        $getUser->password = $getUser->password;
        $getUser->email = $getUser->email;

        $getUser->save();
        return redirect()->route('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
