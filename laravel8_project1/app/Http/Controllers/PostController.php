<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::get();

    return view('backend.posts.index', compact('posts'));

    // $data = [];
    // foreach ($posts as $post) {

    //   $comments = [];
    //   foreach ($post->comments as $comment) {
    //     $comments[] = [
    //       'comment' => $comment->comment
    //     ];
    //   }

    //   $data[] = [
    //     'post' => $post->name,
    //     'comments' => $comments
    //   ];
    // }
    // return response()->json($data);
  }
}
