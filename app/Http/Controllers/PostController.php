<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;


class PostController extends Controller
{
    //
    public function createPost(Request $request, $id = null)
    {
        if ($id == null) {
            $request->validate([
                'post' => 'required',
            ]);
            Post::create([
                'user_id' => Auth::user()->id,
                'post' => $request->post,
            ]);
            return redirect()->back()->with('success', 'post create successfull');

        }
        $decryptID = decrypt($id);

        $request->validate([
            'post' => 'required',
        ]);
        Post::find($decryptID)->update([
            'user_id' => Auth::user()->id,
            'post' => $request->post,
        ]);
        return redirect()->back()->with('success', 'post updated successfull');

    }

    public function destroy(Request $request, $id)
    {
        $decryptID = decrypt($id);
        Post::destroy($decryptID);
        return redirect()->back()->with('success', 'Post deleted successfull');
    }
    public function edit(Request $request, $id)
    {
        $decryptID = decrypt($id);
        $getPostWithId = Post::findOrFail($decryptID);
        $getClick = $getPostWithId->click;
        $addOneClickInPrivous = $getClick + 1;
        $getPostWithId->update([
            'click' => $addOneClickInPrivous,
        ]);
        return view('dashboard.edit', ['getPostWithId' => $getPostWithId]);


    }
    public function read(Request $request, $id){
        $decryptID = decrypt($id);
        $getPostWithId = Post::with('user')->findOrFail($decryptID);
        $getClick = $getPostWithId->click;
        $addOneClickInPrivous = $getClick + 1;
        $getPostWithId->update([
            'click' => $addOneClickInPrivous,
        ]);
        return view('dashboard.read', ['getPostWithId'=>$getPostWithId]);
    } 
}
