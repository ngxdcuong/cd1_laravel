<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->text('description');
            $table->string('location');
        });
    }

    public function down() {
        Schema::dropIfExists('recruitments');
    }
};
