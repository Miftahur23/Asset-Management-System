<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_infos', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name');
            $table->double('asset_id');
            $table->string('category');
            $table->double('quantity');
            $table->double('cost');
            $table->string('purchased_date');
            $table->string('description');
            $table->double('serial_no');
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
        Schema::dropIfExists('asset_infos');
    }
}
