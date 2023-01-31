<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder

{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = [
      [
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'type' => 1,
        'password' => bcrypt('abcd1234'),
      ],
      [
        'name' => 'Manager User',
        'email' => 'manager@example.com',
        'type' => 2,
        'password' => bcrypt('abcd1234'),
      ],
      [
        'name' => 'User',
        'email' => 'user@example.com',
        'type' => 0,
        'password' => bcrypt('abcd1234'),
      ],
    ];
    foreach ($users as $key => $user) {
      User::create($user);
    }
  }
}
