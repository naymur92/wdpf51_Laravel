<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
  public function index()
  {
    // Select using the fluent builder
    $users = DB::table('products')->get();

    echo "<pre>";
    print_r($users);
    echo "</pre>";
  }
}
