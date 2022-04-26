<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckDislikeRequest;
use App\Http\Requests\CheckLikeRequest;
use App\Models\Posts_likes;
use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Posts::all();
        return view('index')
            ->with('posts', $posts);
    }

    public function like($like, CheckLikeRequest $request)
    {
        $post_like = new Posts_likes();
        $post_like->post_id = $like;
        $post_like->ip_address = $request->ip();
        $post_like->voted = true;
        $result = $post_like->save();
        if ($result) {
            $msg = 'your vote saved successfully!';
            $rate = Posts::find($like);
            $rate = $rate['rate'];
            $rate += 1;
            Posts::find($like)->update(['rate' => $rate]);
        }

        return redirect()->route('post')->with('message', $msg);

//           if ($request->hasAny(['like'])){
//            $post_id = Posts_likes::find($id);
//            if ($post_id && $post_id['ip_address'] === $request->ip()){
//                $msg = 'you voted for this post before';
//            }
//            else{
//                $post_like = new Posts_likes();
//                $post_like->post_id = $id;
//                $post_like->ip_address = $request->ip();
//                $post_like->voted = true;
//                $result = $post_like->save();
//                if ($result){
//                    $msg = 'ur vote saved successfully!';
//                }
//                $rate = Posts::find($id);
//                $rate = $rate['rate'];
//                $rate += 1;
//                Posts::find($id)->update(['rate' => $rate]);
////            }
////        }
//        return redirect()->route('post')->with('message', $msg);
    }

    public function dislike($dislike, CheckDislikeRequest $request)
    {
        $post_like = new Posts_likes();
        $post_like->post_id = $dislike;
        $post_like->ip_address = $request->ip();
        $post_like->voted = true;
        $result = $post_like->save();
        if ($result) {
            $msg = 'your vote saved successfully!';
            $rate = Posts::find($dislike);
            $rate = $rate['rate'];
            $rate -= 1;
            Posts::find($dislike)->update(['rate' => $rate]);
        }

        return redirect()->route('post')->with('message', $msg);

    }
}

