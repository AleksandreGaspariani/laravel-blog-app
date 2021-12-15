<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->id)){
            if(Auth::user()->role == '1'){
                $information = Admin::where('id',Auth::user()->id)->first();

                $all_admins = Admin::where('role','!=','0')->paginate(10);

                return view('pages.admin.index',compact('information','all_admins'));
            }
            else{
                return abort(403, 'You dont have permission for it.');
            }
        }else{
            return abort(403, 'Page not found.');
        }
    }

    public function makeAdmin($id, $user_id){

    }
}
