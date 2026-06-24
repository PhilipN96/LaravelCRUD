<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('report_entries', function (Blueprint $table) {
            // Pro Benutzer darf es je Kalenderwoche/Jahr nur einen Eintrag geben.
            $table->unique(['user_id', 'week_number', 'year'], 'report_entries_user_week_year_unique');
        });
    }

    public function down(): void
    {
        Schema::table('report_entries', function (Blueprint $table) {
            $table->dropUnique('report_entries_user_week_year_unique');
        });
    }
};
