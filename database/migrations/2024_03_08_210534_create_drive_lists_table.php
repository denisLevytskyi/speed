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
        Schema::create('drive_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('drive_id')->constrained('drives', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('timestamp')->nullable();
            $table->decimal('speed', 5, 2)->nullable();
            $table->string('time')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drive_lists');
    }
};
