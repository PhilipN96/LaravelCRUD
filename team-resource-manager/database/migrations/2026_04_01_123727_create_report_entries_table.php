<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('week_number');
            $table->year('year');
            $table->string('title');
            $table->longText('content');
            $table->string('status')->default('Entwurf');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_entries');
    }
};