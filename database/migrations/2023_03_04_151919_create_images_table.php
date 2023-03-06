<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
       @return void
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            
            //* FK Announcement
            $table->unsignedBigInteger('announcement_id')->nullable();
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            $table->string('path')->nullable();
            //* Fine FK

            $table->timestamps();
        });
    }

    /**
      @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
