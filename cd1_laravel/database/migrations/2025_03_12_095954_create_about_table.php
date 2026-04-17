<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề (Nguồn gốc, Dịch vụ, Nghề nghiệp)
            $table->text('content'); // Nội dung chi tiết
            $table->string('image')->nullable(); // Đường dẫn ảnh
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('about');
    }
};

