<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Post::orderBy('created_at','desc')->paginate(10);
        return view('index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.posts.create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth::user()->id);


        if ($image = $request->file('photo')) {
            // dd($request);
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $destinationPath = 'image/posts';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['photo'] = "$postImage";

            $data_w_img = [
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $postImage,
                'created_at' => Carbon::now('Asia/Tbilisi'),
                'updated_at' => Carbon::now('Asia/Tbilisi')
            ];

            Post::insert($data_w_img);
            return redirect()->route('home');
        }else{
        $data = [

            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => 'empty',
            'created_at' => Carbon::now('Asia/Tbilisi'),
            'updated_at' => Carbon::now('Asia/Tbilisi')

        ];

        Post::insert($data);

        return redirect()->route('index');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Post::where('id',$id)->first();

        if(!empty($data)){
            $comments = Comment::where('post_id',$id)->paginate(5);

            $sum = Comment::where('post_id',$id)->get()->count();

            if(isset(Auth::user()->id)){
                $logged_user_id = Auth::user()->id;
                $user = User::where('id',$logged_user_id)->first();
                return view('pages.view',compact('data','comments','user','sum'));
            }else{
                return view('pages.view',compact('data','comments','sum'));
            }
        }else{
            return abort(403, 'Post does not exist.');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::where('id',$id)->first();
        return view('pages.posts.edit-post',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Post::where('id',$id)->first();
        if($validation->user_id == Auth::user()->id){
            if ($image = $request->file('photo')) {

                $request->validate([
                    'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $destinationPath = 'image/posts';
                $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $postImage);
                $input['photo'] = "$postImage";

                $updated_data = Post::where('id',$id)->first();

                $updated_data->user_id = Auth::user()->id;
                $updated_data->title = $request->title;
                $updated_data->description = $request->description;
                $updated_data->photo = $postImage;
                $updated_data->updated_at = Carbon::now('Asia/Tbilisi');

                $updated_data->save();

                return redirect()->route('home');
            }else{
                $data = Post::where('id',$id)->first();

                $data->title=$request->title;
                $data->description=$request->description;
                $data->photo = $data->photo;
                $data->updated_at= Carbon::now('Asia/Tbilisi');

                $data->save();

                return redirect()->route('home');
            }
        }else{
            return abort('403','This post is not belongs to you, so you can not edit it.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('post_id',$id)->delete();
        Post::find($id)->delete();

        // $comments = Comment::where('post_id',$id)->get();
        // $comments->delete();

        return redirect()->route('home');
    }

    public function profile($id)
    {
        $user = User::where('id',$id)->first();
        $posts = Post::where('user_id',$id)->orderBy('created_at','desc')->paginate(10);
        return view('profiles',compact('user','posts'));
    }

}
