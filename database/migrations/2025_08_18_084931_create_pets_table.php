<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
   Schema::create('pets', function (Blueprint $table) {
            $table->id();

            // Liên kết với chủ nuôi
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Thông tin cơ bản
            $table->string('name');                // Tên thú cưng
            $table->string('species');             // Loài (Chó, mèo, ...)
            $table->string('breed')->nullable();   // Giống
            $table->date('birthdate')->nullable(); // Ngày sinh
            $table->enum('gender', ['male', 'female', 'unknown'])->default('unknown');
            $table->string('color')->nullable();   // Màu lông
            $table->float('weight')->nullable();   // Cân nặng (kg)

            // Trạng thái đặc biệt
            $table->boolean('is_neutered')->default(false); // Đã triệt sản chưa
            $table->string('microchip')->nullable();        // Số microchip
            $table->text('notes')->nullable();              // Ghi chú: tính cách, dị ứng...

            // Quản lý QR + công khai
            $table->string('public_id')->unique(); // Mã định danh duy nhất cho QR (slug/uuid)
            $table->boolean('is_lost')->default(false); // Trạng thái báo thất lạc

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
