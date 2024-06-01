<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
class DashboardController extends Controller
{
    //
    public function dashboard(Request $request){
        $getAllPost = Post::with('user')->latest('updated_at')->get();
        return view('dashboard.dashboard' , ['getAllPost'=>$getAllPost]);
    }
   
}
