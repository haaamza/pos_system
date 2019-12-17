<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('batch_code');
            $table->integer("variation_id");
            $table->integer("ordered_quantity")->unsigned();
            $table->integer("current_quantity")->unsigned();
            $table->float("unit_cost", 12, 2);
            $table->float("retail_price", 12, 2);
            $table->float("wholesale_price", 12, 2);
            $table->boolean("on_sale")->default(false);
            // $table->date("expiry_date")->default(null);
            $table->timestamps();

            $table->index("batch_code");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
    }
}
