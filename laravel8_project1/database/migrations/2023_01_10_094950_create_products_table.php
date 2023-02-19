<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->smallIncrements('id');
      $table->string('product_name', 50);
      $table->string('product_details', 1500);
      $table->double('product_price', 8, 2);
      $table->string('product_image', 100)->nullable();
      $table->tinyInteger('product_category');
      $table->mediumInteger('product_stock');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('products');
  }
}
