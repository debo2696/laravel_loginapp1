<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RandomModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('random_table', function (Blueprint $table) {
            $table->id();
            $table->string('random_name');
            $table->string('random_object_name');
            $table->longText('random_obj_desc');
            $table->macAddress('random_obj_MAC');
            $table->ipAddress('random_obj_IP');
            $table->enum('price', ['high', 'medium','low']);
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
        //
        Schema::drop('random_table');
    }
}
