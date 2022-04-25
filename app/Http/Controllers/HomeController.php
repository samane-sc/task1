<?php

namespace App\Http\Controllers;

use App\Models\Posts;

class HomeController extends Controller
{
    public function home()
    {
        $msg = '';
        $posts = Posts::all();
        if (isset($_POST['like']) || isset($_POST['dislike'])) {
//            set the cookie
            if (isset($_COOKIE['rate_number_'.$_POST['id']])) {
                $msg = 'you voted before';
            }
            else {
                setcookie("rate_number_".$_POST['id'] , $_POST['id']);
//                set the total rate
                $rate = Posts::where('id',$_POST['id'])->value('rate');
                if (isset($_POST['like'])){
                    $rate += 1;
                    Posts::find($_POST['id'])->update(['rate' => $rate]);
                }
                elseif (isset($_POST['dislike'])){
                    $rate -= 1;
                    Posts::find($_POST['id'])->update(['rate' => $rate]);
                }
                $msg = 'your vote is successfully added . thanks!';
            }
        }
        return view('index')
            ->with('message', $msg)
            ->with('posts', $posts);
    }

}
