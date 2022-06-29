<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cart_products', function (Blueprint $table) {
          $table->integer('quantity')->default(1)->change();
          $table->foreignIdFor(\App\Models\Cart::class);
          $table->foreignIdFor(\App\Models\Product::class);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
