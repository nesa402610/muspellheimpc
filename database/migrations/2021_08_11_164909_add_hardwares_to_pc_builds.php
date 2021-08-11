<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHardwaresToPcBuilds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pc_builds', function (Blueprint $table) {
            $table->unSIGNEDbiginteger('CPU_id')->nullable();
            $table->unSIGNEDbiginteger('GPU1_id')->nullable();
            $table->unSIGNEDbiginteger('GPU2_id')->nullable();
            $table->unSIGNEDbiginteger('MotherBoard_id')->nullable();
            $table->unSIGNEDbiginteger('RAM_id')->nullable();
            $table->unSIGNEDbiginteger('SPU_id')->nullable()->comment('Блок питания');
            $table->unSIGNEDbiginteger('CPU_cooler_id')->nullable();
            $table->foreign('CPU_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('GPU1_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('GPU2_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('MotherBoard_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('RAM_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('SPU_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('CPU_cooler_id')->references('id')->on('products')->onDelete('cascade');

            $table->unSIGNEDbiginteger('HDD1_id')->nullable();
            $table->unSIGNEDbiginteger('HDD2_id')->nullable();
            $table->unSIGNEDbiginteger('HDD3_id')->nullable();
            $table->unSIGNEDbiginteger('HDD4_id')->nullable();
            $table->foreign('HDD1_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('HDD2_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('HDD3_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('HDD4_id')->references('id')->on('products')->onDelete('cascade');

            $table->unSIGNEDbiginteger('SSD1_id')->nullable();
            $table->unSIGNEDbiginteger('SSD2_id')->nullable();
            $table->unSIGNEDbiginteger('SSD3_id')->nullable();
            $table->unSIGNEDbiginteger('SSD4_id')->nullable();
            $table->foreign('SSD2_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('SSD1_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('SSD3_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('SSD4_id')->references('id')->on('products')->onDelete('cascade');

            $table->unSIGNEDbiginteger('PCI1_id')->nullable();
            $table->unSIGNEDbiginteger('PCI2_id')->nullable();
            $table->unSIGNEDbiginteger('PCI3_id')->nullable();
            $table->foreign('PCI1_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('PCI2_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('PCI3_id')->references('id')->on('products')->onDelete('cascade');

            $table->string('OS_name', 30)->nullable()->default('Без ОС');
            $table->string('case', 30)->nullable();

            $table->string('height', 30)->nullable();
            $table->string('width', 30)->nullable();
            $table->string('length', 30)->nullable();
            $table->string('weight', 30)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pc_builds', function (Blueprint $table) {
            $table->unSIGNEDbiginteger('CPU_id')->nullable();
            $table->unSIGNEDbiginteger('GPU1_id')->nullable();
            $table->unSIGNEDbiginteger('GPU2_id')->nullable();
            $table->unSIGNEDbiginteger('MotherBoard_id')->nullable();
            $table->unSIGNEDbiginteger('RAM_id')->nullable();
            $table->unSIGNEDbiginteger('SPU_id')->nullable()->comment('Блок питания');
            $table->unSIGNEDbiginteger('CPU_cooler_id')->nullable();

            $table->unSIGNEDbiginteger('HDD1_id')->nullable();
            $table->unSIGNEDbiginteger('HDD2_id')->nullable();
            $table->unSIGNEDbiginteger('HDD3_id')->nullable();
            $table->unSIGNEDbiginteger('HDD4_id')->nullable();

            $table->unSIGNEDbiginteger('SSD1_id')->nullable();
            $table->unSIGNEDbiginteger('SSD2_id')->nullable();
            $table->unSIGNEDbiginteger('SSD3_id')->nullable();
            $table->unSIGNEDbiginteger('SSD4_id')->nullable();

            $table->unSIGNEDbiginteger('PCI1_id')->nullable();
            $table->unSIGNEDbiginteger('PCI2_id')->nullable();
            $table->unSIGNEDbiginteger('PCI3_id')->nullable();

            $table->string('OS_name', 30)->nullable()->default('Без ОС');
            $table->string('case', 30)->nullable();

            $table->string('height', 30)->nullable();
            $table->string('width', 30)->nullable();
            $table->string('length', 30)->nullable();
            $table->string('weight', 30)->nullable();
        });
    }
}
