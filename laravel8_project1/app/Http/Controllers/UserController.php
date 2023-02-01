<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    $users = User::get();

    $data = [];

    // // has one
    // foreach ($users as $user) {
    //   $data[] = [
    //     'name' => $user->name,
    //     'email' => $user->email,
    //     'phone' => $user->phones->phone,
    //   ];
    // }

    // has many
    foreach ($users as $user) {
      $phones = [];
      foreach ($user->phones as $phone) {
        $phones[] = [
          'ph_num' => $phone->phone
        ];
      }
      $data[] = [
        'name' => $user->name,
        'email' => $user->email,
        'phone' => $phones,
      ];
    }
    return response()->json($data);
  }
}
