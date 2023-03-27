<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_skils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id');
            $table->longText('title')->nullable();
            $table->longText('institute')->nullable();
            $table->longText('country')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_skils');
    }
};
