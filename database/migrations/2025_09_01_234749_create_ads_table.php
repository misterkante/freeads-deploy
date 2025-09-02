<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('description');
            $table->string('photo');
            $table->decimal('price', 8, 2)->default(1);
            $table->string('location');
            $table->enum('condition', ['new', 'good', 'used'])->default('good');
            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('ads');
    }
};
