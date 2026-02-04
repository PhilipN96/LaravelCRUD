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
    Schema::create('resources', function (Blueprint $table) {
        $table->id();
        $table->string('name');            // Name der Ressource
        $table->string('type')->nullable(); // Raum, Gerät, Lizenz, ...
        $table->string('location')->nullable(); // Standort / Raum
        $table->text('description')->nullable(); // Beschreibung
        $table->boolean('is_active')->default(true); // verfügbar ja/nein
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
