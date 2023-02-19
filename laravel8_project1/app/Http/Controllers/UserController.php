<?php

namespace App\Http\Controllers;

use App\Models\Role;
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

  public function showRoles()
  {
    $user = User::find(2);
    return response()->json($user->roles);
  }

  public function roleAssign()
  {
    // set multiple role to one user
    // $user = User::find(1);

    // $roleIds = [1, 2];
    // // $user->roles()->attach($roleIds);
    // $user->roles()->detach([2]);


    // set one role to multiple users
    $role = Role::find(2);
    // $userIds = [10, 11];
    $role->users()->attach(2);
  }
}
