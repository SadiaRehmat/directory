<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            // Link to the users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Link to the specializations table
            $table->foreignId('specialization_id')->constrained()->onDelete('cascade');

            $table->string('qualification');
            $table->unsignedTinyInteger('experience'); // Years
            $table->decimal('consultation_fee', 8, 2);

            $table->string('phone', 20);
            $table->string('city');
            $table->text('address');

            $table->text('about')->nullable();

            $table->string('profile_image')->nullable();

            $table->boolean('status')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
