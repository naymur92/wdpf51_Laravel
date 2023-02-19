<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $user = new User();
    $user->name = 'Naymur Rahman';
    $user->email = 'naymur@example.com';
    $user->password = Hash::make(value: 'abcd1234');
    $user->remember_token = Str::random(10);
    $user->save();

    $user = new User();
    $user->name = 'Kamrul Hasan';
    $user->email = 'kamrul@example.com';
    $user->password = Hash::make(value: 'abcd1234');
    $user->remember_token = Str::random(10);
    $user->save();

    $roles = ['superadmin', 'admin', 'manager', 'editor', 'contributor', 'subscriber', 'user'];
    foreach ($roles as $role) {
      $u_role = new Role();
      $u_role->name = $role;
      $u_role->save();
    }

    // // has one
    // $phone = new Phone();
    // $phone->user_id = 1;
    // $phone->phone = 1737036324;
    // $phone->save();

    // $phone = new Phone();
    // $phone->user_id = 2;
    // $phone->phone = 1558981652;
    // $phone->save();

    // has many
    for ($i = 1; $i <= 10; $i++) {
      $phone = new Phone();
      $phone->user_id = rand(1, 2);
      $phone->phone = rand(1558981652, 15697815415);
      $phone->save();
    }


    // post seeder
    for ($i = 1; $i <= 15; $i++) {
      $post = new Post();
      $post->name = 'Sample Post - ' . $i;

      $post->save();
    }
    for ($i = 1; $i <= 50; $i++) {
      $comment = new Comment();
      $comment->post_id = rand(1, 15);
      $comment->comment = 'Comment - ' . $i;

      $comment->save();
    }

    Product::factory()
      ->count(50)
      ->create();

    Category::factory()
      ->count(9)
      ->create();
  }
}
