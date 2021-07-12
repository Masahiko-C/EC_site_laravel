<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->unsignedbigInteger('order_number');
            $table->unsignedbigInteger('item_id');
            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity');
            $table->timestamps();

            $table->foreign('order_number')
                ->references('order_number')
                ->on('purchases')
                ->onDelete('cascade');

            $table->primary(['order_number', 'item_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
