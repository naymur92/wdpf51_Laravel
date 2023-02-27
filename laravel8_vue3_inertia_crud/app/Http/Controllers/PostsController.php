<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
  public function __construct()
  {
    $this->middleware("auth")->except(["index"]);
  }

  public function index()
  {
    return Inertia::render('Posts/Index', [
      "posts" => Post::orderBy('id', 'DESC')->paginate(10)
    ]);
  }

  public function create()
  {
    return Inertia::render('Posts/Create');
  }

  public function store(Request $request)
  {
  }

  public function edit($id)
  {
    return Inertia::render('Posts/Edit', [
      'post' => Post::findOrFail($id)
    ]);
  }

  public function update(Request $request, $id)
  {
  }

  public function destroy(Request $request, $id)
  {
  }
}
