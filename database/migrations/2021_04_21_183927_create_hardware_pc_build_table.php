<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwarePcBuildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware_pc_build', function (Blueprint $table) {
            $table->id();
            $table->UNSIGNEDbiginteger('pc_build_id');
            $table->UNSIGNEDbiginteger('hardware_id');
            $table->integer('quantity')->default(0);
            $table->timestamps();

            $table->foreign('pc_build_id')->references('id')->on('pc_builds')->onDelete('cascade');
            $table->foreign('hardware_id')->references('id')->on('hardware')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardware_pc_build');
    }
}
